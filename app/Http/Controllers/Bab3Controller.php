<?php

namespace App\Http\Controllers;

use App\Http\Api\KakKotaMadiunApi;
use App\Models\Bab3;
use App\Models\Jenis;
use App\Models\TahunDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use Barryvdh\DomPDF\Facade as PDF;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class Bab3Controller extends Controller
{
    public function index()
    {
        $bab3 = Bab3::with('jenis')->get();
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        return view('layouts.admin.bab3.index', compact('bab3', 'jenis', 'tahun'));
    }

    public function create()
    {
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/daftar_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        $data_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];

        return view('layouts.admin.bab3.create', compact('jenis', 'data_opd','tahun'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bab' => 'required',
            // 'jenis_id' => 'required',
            'kode_opd' => 'required|string',
            'tahun_id' => 'required',
            'uraian1' => 'nullable',
            'uraian2' => 'nullable',
            'uraian3' => 'nullable',
            'uraian4' => 'nullable',
            'uraian5' => 'nullable',
            'lama_periode' => 'nullable',

        ]);

        Bab3::create([
            'nama_bab' => $request->nama_bab,
            // 'jenis_id' => $request->jenis_id,
            'kode_opd' => $request->kode_opd,
            'tahun_id' => $request->tahun_id,
            'uraian1' => $request->uraian1,
            'uraian2' => $request->uraian2,
            'uraian3' => $request->uraian3,
            'uraian4' => $request->uraian4,
            'uraian5' => $request->uraian5,
            'lama_periode' => $request->lama_periode,
            'uraian' => $request->uraian,
            'isu_strategis' => json_encode($request->isu_strategis),
            'akar_masalah' => $request->akar_masalah,
        ]);

        return redirect()->route('layouts.admin.bab3.index')->with('success', 'BAB 3 created successfully');
    }

    public function edit($id)
    {
        $bab3 = Bab3::findOrFail($id);
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/daftar_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        $data_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];

        return view('layouts.admin.bab3.edit', compact('bab3', 'jenis', 'data_opd', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bab' => 'required|string|max:255',
            // 'jenis_id' => 'required|exists:jenis,id',
            'kode_opd' => 'required|string',
            'tahun_id' => 'required|exists:tahun_dokumen,id',
            'uraian1' => 'required|string',
            'uraian2' => 'required|string',
            'uraian3' => 'required|string',
            'uraian4' => 'required|string',
            'uraian5' => 'required|string',
            'lama_periode' => 'nullable',
            'uraian' => 'nullable|string',
            'isu_strategis' => 'nullable'

        ]);

        $bab3 = Bab3::findOrFail($id);

        $bab3->update([
            'nama_bab' => $request->nama_bab,
            // 'jenis_id' => $request->jenis_id,
            'kode_opd' => $request->kode_opd,
            'tahun_id' => $request->tahun_id,
            'uraian1' => $request->uraian1,
            'uraian2' => $request->uraian2,
            'uraian3' => $request->uraian3,
            'uraian4' => $request->uraian4,
            'uraian5' => $request->uraian5,
            'lama_periode' => $request->lama_periode,
            'isu_strategis' => json_encode($request->isu_strategis),
            'uraian' => $request->uraian,
        ]);

        return redirect()->route('layouts.admin.bab3.index')->with('success', 'BAB 3 updated successfully');
    }

    public function destroy($id)
    {
        $bab3 = Bab3::findOrFail($id);
        $bab3->delete();

        return redirect()->route('layouts.admin.bab3.index')->with('success', 'BAB 3 deleted successfully');
    }

    public function show($id)
    {
        $bab3 = Bab3::findOrFail($id);
        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';

        // Use GET if POST is not required
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        if (!$response->successful()) {
            abort(500, 'Failed to fetch data from API');
        }

        $urusan_opd = $response->json()['results'] ?? [];
        $selectedOpd = collect($urusan_opd)->firstWhere('kode_opd', $bab3->kode_opd);

        $selectedBidangUrusan = [];
        if ($selectedOpd) {
            $kodeBidangUrusan = is_array($bab3->kode_bidang_urusan) ? $bab3->kode_bidang_urusan : [$bab3->kode_bidang_urusan];

            foreach ($selectedOpd['bidang_urusan'] ?? [] as $bidang) {
                if (in_array($bidang['kode_bidang_urusan'] ?? '', $kodeBidangUrusan)) {
                    $selectedBidangUrusan[] = $bidang;
                }
            }
        }

        $permasalahanList = json_decode($bab3->akar_masalah, true);

        return view('layouts.admin.bab3.show', [
            'bab3' => $bab3,
            'urusan_opd' => $urusan_opd,
            'selectedBidangUrusan' => $selectedBidangUrusan,
            'permasalahanList' => $permasalahanList,
        ]);
    }

    public function exportPdf($id)
    {
        try {
            // Fetch the Bab3 record
            $bab3 = Bab3::findOrFail($id);

            // API URL and fetching data
            $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
            $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

            if (!$response->successful()) {
                throw new \Exception('Failed to fetch data from API');
            }

            // Parse API response
            $urusan_opd = $response->json()['results'] ?? [];
            $permasalahanList = json_decode($bab3->akar_masalah, true);
            // Render HTML view
            $html = view('layouts.admin.bab3.pdf', compact('bab3', 'urusan_opd', 'permasalahanList'))->render();

            // Initialize MPDF
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                // Custom F4 (HVS) paper size: 210mm x 330mm
                'format' => [210, 330],
                'orientation' => 'P',
                'tempDir' => storage_path('app/temp'),
                'margin_left' => 25, // Tambahkan margin kiri untuk penjilidan
                'margin_right' => 15, // Margin kanan standar
                'margin_top' => 20, // Margin atas
                'margin_bottom' => 20, // Margin bawah
            ]);

            $mpdf->SetHTMLFooter('
                <div style="font-size: 10pt; border-top: 1px solid #000; padding-top: 5px; text-align: left;">
                    Renstra Elektronik Pemerintah Kota Madiun
                </div>
            ');

            // Write HTML to PDF
            $mpdf->WriteHTML($html);
            $fileName = 'bab3-' . $id . '.pdf';

            // Return PDF response
            return $mpdf->Output($fileName, 'I');
        } catch (\Exception $e) {
            // Log error and return JSON response
            \Log::error('PDF generation error: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate PDF: ' . $e->getMessage()], 500);
        }
    }

    public function exportPdf2($id)
    {
        try {
            // Fetch the Bab3 record
            $bab3 = Bab3::findOrFail($id);

            // API URL and fetching data
            $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
            $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

            if (!$response->successful()) {
                throw new \Exception('Failed to fetch data from API');
            }

            // Parse API response
            $urusan_opd = $response->json()['results'] ?? [];
            $permasalahanList = json_decode($bab3->akar_masalah, true);
            // Render HTML view
            $html = view('layouts.admin.bab3.pdf2', compact('bab3', 'urusan_opd', 'permasalahanList'))->render();

            // Initialize MPDF
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                // Custom F4 (HVS) paper size: 210mm x 330mm
                'format' => [210, 330],
                'orientation' => 'L',
                'tempDir' => storage_path('app/temp'),
                'margin_left' => 25, // Tambahkan margin kiri untuk penjilidan
                'margin_right' => 15, // Margin kanan standar
                'margin_top' => 20, // Margin atas
                'margin_bottom' => 20, // Margin bawah
            ]);

            $mpdf->SetHTMLFooter('
                <div style="font-size: 10pt; border-top: 1px solid #000; padding-top: 5px; text-align: left;">
                    Renstra Elektronik Pemerintah Kota Madiun
                </div>
            ');

            // Write HTML to PDF
            $mpdf->WriteHTML($html);
            $fileName = 'bab3-' . $id . '.pdf';

            // Return PDF response
            return $mpdf->Output($fileName, 'I');
        } catch (\Exception $e) {
            // Log error and return JSON response
            \Log::error('PDF generation error: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate PDF: ' . $e->getMessage()], 500);
        }
    }

    public function getPermasalahanOpd($tahun, $kode_opd)
    {
        try {
            $api = new KakKotaMadiunApi;
            $response = $api->permasalahanOpd($tahun, $kode_opd);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('API Response:', $data);
                $programs = collect($data['results'] ?? []);

                if ($programs->isEmpty()) {
                    return response()->json(['message' => 'No data found or data is in an unexpected format'], 404);
                }

                $consolidatedData = [];

                foreach ($programs as $program) {
                    $kode_program = $program['kode_program'] ?? 'Unknown';

                    foreach ($program['details'] as $detail) {
                        $isu_strategis = $detail['isu_strategis'] ?? 'Unknown';

                        // Append unique issues
                        if (!in_array($isu_strategis, $consolidatedData)) {
                            $consolidatedData[] = $isu_strategis;
                        }
                    }
                }

                return response()->json(['results' => $consolidatedData]);
            } else {
                Log::error('Failed to fetch data: ' . $response->body());
                return response()->json(['message' => 'Failed to fetch data'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Error fetching data: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    public function getAkarMasalah($tahun, $kode_opd)
    {
        try {
            $api = new KakKotaMadiunApi();
            $response = $api->akarMasalah($tahun, $kode_opd);

            \Log::info('API Response Status:', ['status' => $response->status()]);

            if ($response->successful()) {
                $data = $response->json();

                $masalahPokoks = [];
                if (isset($data['masalah_pokoks']) && is_array($data['masalah_pokoks'])) {
                    foreach ($data['masalah_pokoks'] as $masalahPokok) {
                        $masalahList = [];

                        // Iterate "masalahs" pada setiap "masalah_pokok"
                        if (isset($masalahPokok['masalahs']) && is_array($masalahPokok['masalahs'])) {
                            foreach ($masalahPokok['masalahs'] as $masalah) {
                                $akarMasalahList = [];

                                // Iterate "akar_masalahs" pada setiap "masalah"
                                if (isset($masalah['akar_masalahs']) && is_array($masalah['akar_masalahs'])) {
                                    foreach ($masalah['akar_masalahs'] as $akarMasalah) {
                                        $akarMasalahList[] = [
                                            'id_masalah' => $akarMasalah['id_masalah'],
                                            'akar_masalah' => $akarMasalah['akar_masalah'] ?? 'Data tidak tersedia',
                                        ];
                                    }
                                }

                                $masalahList[] = [
                                    'id_masalah' => $masalah['id_masalah'],
                                    'masalah' => $masalah['masalah'] ?? 'Data tidak tersedia',
                                    'akar_masalahs' => $akarMasalahList,
                                ];
                            }
                        }

                        $masalahPokoks[] = [
                            'id_masalah_pokok' => $masalahPokok['id_masalah_pokok'],
                            'masalah_pokok' => $masalahPokok['masalah_pokok'] ?? 'Data tidak tersedia',
                            'masalahs' => $masalahList,
                        ];
                    }
                }

                return response()->json([
                    'tahun' => $tahun,
                    'kode_opd' => $kode_opd,
                    'masalah_pokoks' => $masalahPokoks,
                ]);
            } else {
                return response()->json(['message' => 'Failed to fetch data'], 500);
            }
        } catch (\Exception $e) {
            \Log::error('Error fetching data: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }


    //     public function getPermasalahanOpd($tahun, $kode_opd)
    // {
    //     try {
    //         $api = new KakKotaMadiunApi;
    //         $response = $api->permasalahanOpd($tahun, $kode_opd);

    //         if ($response->successful()) {
    //             $data = $response->json();

    //             Log::info('API Response:', $data);

    //             $programs = collect($data['results'] ?? []);

    //             if ($programs->isEmpty()) {
    //                 return response()->json(['message' => 'No data found or data is in an unexpected format'], 404);
    //             }

    //             // Consolidate the data by kode_program and isu_strategis
    //             $consolidatedData = [];

    //             foreach ($programs as $program) {
    //                 $kode_program = $program['kode_program'] ?? 'Unknown';

    //                 foreach ($program['details'] as $detail) {
    //                     $isu_strategis = $detail['isu_strategis'] ?? 'Unknown';

    //                     // Initialize the entry if it doesn't exist
    //                     if (!isset($consolidatedData[$kode_program])) {
    //                         $consolidatedData[$kode_program] = [
    //                             'isu_strategis' => [], // Changed to an array to collect all isu_strategis
    //                         ];
    //                     }

    //                     // Append isu_strategis if it's unique
    //                     if (!in_array($isu_strategis, $consolidatedData[$kode_program]['isu_strategis'])) {
    //                         $consolidatedData[$kode_program]['isu_strategis'][] = $isu_strategis;
    //                     }
    //                 }
    //             }

    //             return response()->json(array_values($consolidatedData)); // Return as JSON response
    //         } else {
    //             Log::error('Failed to fetch data: ' . $response->body());
    //             return response()->json(['message' => 'Failed to fetch data'], 500);
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('Error fetching data: ' . $e->getMessage());
    //         return response()->json(['message' => 'An error occurred'], 500);
    //     }
    // }


    // public function getPermasalahanOpd($tahun, $kode_opd)
    // {
    //     try {
    //         $api = new KakKotaMadiunApi;
    //         $response = $api->permasalahanOpd($tahun, $kode_opd);

    //         if ($response->successful()) {
    //             $data = $response->json();

    //             Log::info('API Response:', $data);

    //             $programs = collect($data['results'] ?? []);

    //             if ($programs->isEmpty()) {
    //                 return response()->json(['message' => 'No data found or data is in an unexpected format'], 404);
    //             }

    //             // Consolidate the data by kode_program and isu_strategis
    //             $consolidatedData = [];

    //             foreach ($programs as $program) {
    //                 $kode_program = $program['kode_program'] ?? 'Unknown';

    //                 foreach ($program['details'] as $detail) {
    //                     $isu_strategis = $detail['isu_strategis'] ?? 'Unknown';

    //                     if (!isset($consolidatedData[$kode_program])) {
    //                         $consolidatedData[$kode_program] = [
    //                             // 'program' => $detail['program'] ?? 'Unknown',
    //                             // 'indikator_program' => $detail['indikator_program'] ?? 'Unknown',
    //                             // 'target_program' => $detail['target_program'] ?? 'Unknown',
    //                             // 'satuan_program' => $detail['satuan_program'] ?? 'Unknown',
    //                             // 'permasalahan' => [],
    //                             'isu_strategis' => $isu_strategis,
    //                         ];
    //                     }

    //                     // Append unique problems to the existing kode_program entry
    //                     // if (!empty($detail['permasalahans'])) {
    //                     //     $consolidatedData[$kode_program]['permasalahan'] = array_unique(array_merge(
    //                     //         $consolidatedData[$kode_program]['permasalahan'],
    //                     //         $detail['permasalahans']
    //                     //     ));
    //                     // }
    //                 }
    //             }

    //             return array_values($consolidatedData);
    //         } else {
    //             Log::error('Failed to fetch data: ' . $response->body());
    //             return response()->json(['message' => 'Failed to fetch data'], 500);
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('Error fetching data: ' . $e->getMessage());
    //         return response()->json(['message' => 'An error occurred'], 500);
    //     }
    // }


    // public function getPermasalahanOpd($kode_opd, $tahun)
    // {
    //     try {
    //         $api = new KakKotaMadiunApi;
    //         $response = $api->permasalahanOpd($kode_opd, $tahun);

    //         if ($response->successful()) {
    //             $data = $response->json();

    //             Log::info('API Response:', $data);

    //             $programs = collect($data['results'] ?? []);

    //             if ($programs->isEmpty()) {
    //                 return response()->json(['message' => 'No data found or data is in an unexpected format'], 404);
    //             }

    //             return $programs->flatMap(function ($program) {
    //                 return collect($program['details'] ?? [])->map(function ($detail) use ($program) {
    //                     return [
    //                         'kode_program' => $program['kode_program'] ?? 'Unknown',
    //                         'program' => $detail['program'] ?? 'Unknown',
    //                         'isu_strategis' => $detail['isu_strategis'] ?? 'Unknown',
    //                         'permasalahan' => $detail['permasalahans'] ?? [],
    //                     ];
    //                 });
    //             })->values()->toArray();
    //         } else {
    //             Log::error('Failed to fetch data: ' . $response->body());
    //             return response()->json(['message' => 'Failed to fetch data'], 500);
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('Error fetching data: ' . $e->getMessage());
    //         return response()->json(['message' => 'An error occurred'], 500);
    //     }
    // }


    // public function exportPdf($id)
    // {
    //     $bab3 = Bab3::findOrFail($id);
    //     $pdf = PDF::loadView('layouts.admin.bab3.pdf', compact('bab3'));
    //     return $pdf->download('bab3-' . $id . '.pdf');
    // }

    // public function exportWord($id)
    // {
    //     $bab3 = Bab3::findOrFail($id);qq

    //     $phpWord = new PhpWord();
    //     $section = $phpWord->addSection();

    //     $section->addText(htmlspecialchars(strip_tags($bab3->permasalahan_pelayanan)));
    //     $section->addTextBreak(1);
    //     $section->addText(htmlspecialchars(strip_tags($bab3->isu_strategis)));

    //     $writer = IOFactory::createWriter($phpWord, 'Word2007');
    //     $fileName = 'bab3-' . $id . '.docx';
    //     $tempFile = tempnam(sys_get_temp_dir(), 'bab3') . '.docx';
    //     $writer->save($tempFile);

    //     return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    // }
}
