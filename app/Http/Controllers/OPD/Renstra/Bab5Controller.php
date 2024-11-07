<?php

namespace App\Http\Controllers\OPD\Renstra;

use App\Http\Controllers\Controller;
use App\Models\Bab5;
use App\Models\Jenis;
use App\Models\TahunDokumen;
use Illuminate\Http\Request;
use App\Http\Api\KakKotaMadiunApi;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class Bab5Controller extends Controller
{

    public function index()
    {
        $userKodeOpd = Auth::user()->kode_opd;

        $bab5 = Bab5::with('jenis', 'tahun')
            ->where('kode_opd', $userKodeOpd)
            ->get();

        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $api = new KakKotaMadiunApi();

        try {
            $urusan_opd = $api->urusanOpd();
            $kodeOpds = collect($urusan_opd->json())->pluck('kode_opd')->unique();
        } catch (\Exception $e) {
            Log::error('Failed to fetch Urusan OPD:', ['error' => $e->getMessage()]);
            $urusan_opd = null;
            $kodeOpds = collect();
        }

        return view('layouts.opd.renstra.bab5.index', compact('bab5', 'jenis', 'urusan_opd', 'tahun', 'kodeOpds', 'userKodeOpd'));
    }

    // Show form to create a new Bab4 record
    public function create()
    {

        $userKodeOpd = Auth::user()->kode_opd;

        $bab5 = Bab5::with('jenis', 'tahun')
            ->where('kode_opd', $userKodeOpd)
            ->get();

        $api = new KakKotaMadiunApi();

        try {
            $urusan_opd = $api->urusanOpd();
            $results = $urusan_opd->json()['results'] ?? [];
            $kodeOpds = collect($results)->map(function ($item) {
                return [
                    'kode_opd' => $item['kode_opd'],
                    'nama_opd' => $item['nama_opd'],
                ];
            })->unique('kode_opd');
        } catch (\Exception $e) {
            Log::error('Failed to fetch Urusan OPD for create form:', ['error' => $e->getMessage()]);
            $kodeOpds = collect();
        }

        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();
        // $bab5 = Bab5::all();

        return view('layouts.opd.renstra.bab5.create', compact('kodeOpds', 'jenis', 'tahun','userKodeOpd'));
    }
    // Remove this block to avoid duplicate method definition
    // Store a new Bab4 record in the database
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'nama_bab' => 'required|string|max:255',
            'jenis_id' => 'required|integer|exists:jenis,id',
            'tahun_id' => 'required|integer|exists:tahun_dokumen,id',
            'kode_opd' => 'required|string|max:50',
            'nama_opd' => 'nullable|string|max:255',
            'tujuan_opd' => 'nullable|array',
            'sasaran_opd' => 'nullable|array',
            'strategi' => 'nullable|array',
            'arah_kebijakan' => 'nullable|array',
            'uraian' => 'nullable|string',
        ]);

        try {
            $validatedData['tujuan_opd'] = json_encode($request->input('tujuan_opd'));
            $validatedData['sasaran_opd'] = json_encode($request->input('sasaran_opd'));
            $validatedData['strategi'] = json_encode($request->input('strategi'));
            $validatedData['arah_kebijakan'] = json_encode($request->input('arah_kebijakan'));
            // Store the validated data
            Bab5::create($validatedData);
            return redirect()->route('layouts.opd.bab5.index')->with('success', 'Data has been saved successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to store Bab5 record:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors('Failed to save data.');
        }
    }


    // Fetch details of an OPD based on kode_opd
    public function getOpdDetails($kode_opd)
    {
        \Log::info('Received Kode OPD:', ['kode_opd' => $kode_opd]);


        try {
            $api = new KakKotaMadiunApi();
            $response = $api->urusanOpd();

            if ($response->successful()) {
                $data = $response->json();
                \Log::info('Fetched OPD Data:', ['data' => $data]);

                // Log the specific OPD data you are trying to retrieve
                $opd = collect($data['results'])->firstWhere('kode_opd', $kode_opd);
                \Log::info('Filtered OPD Data:', ['tujuan_opd' => $opd]);

                if ($opd) {
                    $tujuan_response = $api->tujuanOpd($opd['kode_opd']);

                    if ($tujuan_response->successful()) {
                        $data_tujuan = $tujuan_response->json();
                        // Cari tujuan dengan periode 2020-2024
                        // tujuan_opd hanya membawa tujuan pertama
                        // TODO: get all tujuan by periode
                        $tujuan_opd = collect($data_tujuan['results']['data']['tujuan_opd'])->firstWhere('periode', '2020-2024');

                        // sasaran opd kosong sebagai default
                        $sasaran_opd = '';

                        $sasaran_opd_response = $api->sasaranOpd($kode_opd, '2024');
                        if ($sasaran_opd_response->successful()) {
                            $data_sasaran = $sasaran_opd_response->json();

                            // Data yang diambil baru data pertama
                            // TODO: get all data sasaran opd, dan mapping ke sasaran_opd
                            $sasaran_opd = collect($data_sasaran['results']['data']['sasaran_opds'])->first();
                        }

                        return response()->json([
                            'nama_opd' => $opd['nama_opd'] ?? '',
                            'tujuan_opd' => $tujuan_opd['tujuan'] ?? '',
                            'sasaran_opd' => $sasaran_opd['sasaran_opd'] ?? '',
                        ]);
                    }
                    return response()->json(['message' => 'Tujuan OPD Not Found'], 404);
                }

                return response()->json(['message' => 'OPD not found'], 404);
            }

            \Log::error('Failed to fetch data from Urusan OPD API', [
                'response' => $response->body(),
            ]);

            return response()->json(['message' => 'Failed to fetch data'], 500);
        } catch (\Exception $e) {
            \Log::error('Error fetching OPD details: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    // Show form to edit an existing Bab4 record

    public function edit($id)
    {

        $userKodeOpd = Auth::user()->kode_opd;

        $bab5 = Bab5::with('jenis', 'tahun')
            ->where('kode_opd', $userKodeOpd)
            ->findOrFail($id);

        $api = new KakKotaMadiunApi();

        try {
            $urusan_opd = $api->urusanOpd();
            $results = $urusan_opd->json()['results'] ?? [];
            $kodeOpds = collect($results)->map(function ($item) {
                return [
                    'kode_opd' => $item['kode_opd'],
                    'nama_opd' => $item['nama_opd'],
                ];
            })->unique('kode_opd');
        } catch (\Exception $e) {
            Log::error('Failed to fetch Urusan OPD for edit form:', ['error' => $e->getMessage()]);
            $kodeOpds = collect();
        }

        $bab5 = Bab5::findOrFail($id);

        $bab5->tujuan_opd = json_decode($bab5->tujuan_opd);
        $bab5->sasaran_opd = json_decode($bab5->sasaran_opd);
        $bab5->strategi = json_decode($bab5->strategi);
        $bab5->arah_kebijakan = json_decode($bab5->arah_kebijakan);
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        return view('layouts.opd.renstra.bab5.edit', compact('bab5', 'kodeOpds', 'jenis', 'tahun','userKodeOpd'));
    }

    // Update an existing Bab5 record in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_bab' => 'required|string|max:255',
            'jenis_id' => 'required|integer|exists:jenis,id',
            'tahun_id' => 'required|integer|exists:tahun_dokumen,id',
            'kode_opd' => 'required|string|max:50',
            'nama_opd' => 'nullable|string|max:255',
            'tujuan_opd' => 'nullable|array',
            'sasaran_opd' => 'nullable|array',
            'strategi' => 'nullable|array',
            'arah_kebijakan' => 'nullable|array',
            'uraian' => 'nullable|string',
        ]);

        try {
            $bab5 = Bab5::findOrFail($id);

            $validatedData['tujuan_opd'] = json_encode($request->input('tujuan_opd'));
            $validatedData['sasaran_opd'] = json_encode($request->input('sasaran_opd'));
            $validatedData['strategi'] = json_encode($request->input('strategi'));
            $validatedData['arah_kebijakan'] = json_encode($request->input('arah_kebijakan'));
            // Store the validated data
            $bab5->update($validatedData); // Update the record with new data
            return redirect()->route('layouts.opd.bab5.index')->with('success', 'Data has been updated successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to update Bab5 record:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors('Failed to update data.');
        }
    }


    public function destroy($id)
    {
        $bab5 = Bab5::findOrFail($id);
        $bab5->delete();

        return redirect()->route('layouts.opd.bab5.index')->with('success', 'BAB 1 deleted successfully');
    }

    public function show($id)
    {
        $bab5 = Bab5::findOrFail($id);

        $uraian = $bab5->uraian;
        $nama_opd = $bab5->nama_opd;
        $tujuan_opd = json_decode($bab5->tujuan_opd, true);
        $sasaran_opd_list = json_decode($bab5->sasaran_opd, true);
        $strategi = json_decode($bab5->strategi, true);
        $kebijakan_list = json_decode($bab5->arah_kebijakan, true);

        // Return the view with the required data
        return view('layouts.opd.renstra.bab5.show', [
            'bab5' => $bab5,
            'uraian' => $uraian,
            'nama_opd' => $nama_opd,
            'tujuan_opd' => $tujuan_opd,
            'sasaran_opd_list' => $sasaran_opd_list,
            'strategi' => $strategi,
            'kebijakan_list' => $kebijakan_list,
        ]);
    }


    public function getStrategiArahKebijakan($tahun, $kode_opd)
    {

        try {
            $api = new KakKotaMadiunApi();
            $response = $api->strategiArahKebijakan($tahun, $kode_opd);

            \Log::info('API Response Status:', ['status' => $response->status()]);
            if ($response->successful()) {
                $data = $response->json();

                $tujuan_opd = $data['tujuan_opd'] ?? 'Data tidak tersedia';
                $sasaran_opd = [];
                $strategi = $data['strategi'] ?? 'Data tidak tersedia';
                $arah_kebijakan = [];

                if (isset($data['sasaran_opd_list']) && is_array($data['sasaran_opd_list'])) {
                    foreach ($data['sasaran_opd_list'] as $sasaran) {
                        $sasaran_opd[] = $sasaran['sasaran_opd'];
                    }
                }
                if (isset($data['kebijakan_list']) && is_array($data['kebijakan_list'])) {
                    foreach ($data['kebijakan_list'] as $kebijakan) {
                        $arah_kebijakan[] = $kebijakan['arah_kebijakan'];
                    }
                }

                return response()->json([
                    'tahun' => $tahun,
                    'tujuan_opd' => $tujuan_opd,
                    'sasaran_opd' => $sasaran_opd,  // Kembali sebagai array
                    'strategi' => $strategi,
                    'arah_kebijakan' => $arah_kebijakan, // Kembali sebagai array
                ]);
            } else {
                return response()->json(['message' => 'Failed to fetch data'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Error fetching data: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    public function exportPdf($id)
    {
        try {
            // Find the corresponding Bab5 record, or fail if not found
            $bab5 = Bab5::findOrFail($id);

            // Fetching the necessary fields directly from the Bab5 record
            $uraian = $bab5->uraian;
            $nama_opd = $bab5->nama_opd;
            $tujuan_opd = json_decode($bab5->tujuan_opd, true);
            $sasaran_opd_list = json_decode($bab5->sasaran_opd, true);
            $strategi = json_decode($bab5->strategi, true);
            $kebijakan_list = json_decode($bab5->arah_kebijakan, true);

            \Log::info('Bab5 data', [
                'uraian' => $uraian,
                'nama_opd' => $nama_opd,
                'tujuan_opd' => $tujuan_opd,
                'sasaran_opd_list' => $sasaran_opd_list,
                'strategi' => $strategi,
                'kebijakan_list' => $kebijakan_list,
            ]);

            // Render the view to HTML for PDF generation
            $html = view('layouts.opd.renstra.bab5.pdf', [
                'bab5' => $bab5,
                'uraian' => $uraian,
                'nama_opd' => $nama_opd,
                'tujuan_opd' => $tujuan_opd,
                'strategi' => $strategi,
                'sasaran_opd_list' => $sasaran_opd_list,
                'kebijakan_list' => $kebijakan_list,
            ])->render();

            // Create a new mPDF instance with the desired settings
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                'format' => [210, 330], // Custom F4 size: 210mm x 330mm
                'orientation' => 'P',    // Portrait orientation
                'tempDir' => storage_path('app/temp'),
                'margin_left' => 25,      // Left margin for binding
                'margin_right' => 15,     // Right margin
                'margin_top' => 20,       // Top margin
                'margin_bottom' => 20,    // Bottom margin
            ]);

            // Set the footer
            $mpdf->SetHTMLFooter('
                <div style="font-size: 10pt; border-top: 1px solid #000; padding-top: 5px; text-align: left;">
                    Renstra Elektronik Pemerintah Kota Madiun
                </div>
            ');

            // Write the HTML content to the PDF
            $mpdf->WriteHTML($html);

            $filename = 'bab5-' . $id . '.pdf';
            $mpdf->Output($filename, 'I');
        } catch (\Exception $e) {
            // Log any unexpected exceptions that occur during PDF generation
            \Log::error('Failed to generate PDF:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Unable to generate PDF'], 500);
        }
    }
}
