<?php

namespace App\Http\Controllers\OPD\Renstra;

use App\Http\Controllers\Controller;
use App\Models\Bab8;
use App\Models\Jenis;
use App\Models\TahunDokumen;
use Illuminate\Http\Request;
use App\Http\Api\KakKotaMadiunApi;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class Bab8Controller extends Controller
{
    // Display a list of Bab8 records
    public function index()
    {

        $userKodeOpd = Auth::user()->kode_opd;

        $bab8 = Bab8::with('jenis', 'tahun')
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

        return view('layouts.opd.renstra.bab8.index', compact('bab8', 'jenis', 'urusan_opd', 'tahun', 'kodeOpds', 'userKodeOpd'));
    }

    // Show form to create a new Bab8 record
    public function create()
    {
        $userKodeOpd = Auth::user()->kode_opd;

        $bab8 = Bab8::with('jenis', 'tahun')
            ->where('kode_opd', $userKodeOpd)
            ->get();

        $api = new KakKotaMadiunApi();

        try {
            $urusan_opd = $api->urusanOpd();
            $results = $urusan_opd->json()['results'] ?? [];
            // $kodeOpds = collect($results)->pluck('kode_opd')->unique();
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

        return view('layouts.opd.renstra.bab8.create', compact('kodeOpds', 'jenis', 'tahun', 'userKodeOpd'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_bab' => 'required|string|max:255',
            // 'jenis_id' => 'required|integer|exists:jenis,id',
            'tahun_id' => 'required|integer|exists:tahun_dokumen,id',
            'kode_opd' => 'required|string|max:50',
            'nama_kepala_opd' => 'required|string|max:255',
            'nip_kepala_opd' => 'required|string|max:50',
            'tanggal' => 'required',
            'tujuan_opd' => 'nullable|string',
            'sasaran_opd' => 'nullable|string',
            'uraian' => 'nullable|string',
            'pangkat_kepala_opd' => 'nullable|string',
        ]);

        try {
            Bab8::create($validatedData);
            return redirect()->route('layouts.opd.bab8.index')->with('success', 'Data has been saved successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to store Bab8 record:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors('Failed to save data.');
        }
    }

    public function findOpd($kode_opd)
    {
        try {
            $api = new KakKotaMadiunApi();
            $response = $api->findOpd();

            if ($response->successful()) {
                $data = $response->json();

                $filteredData = collect($data['results'] ?? [])
                    ->firstWhere('kode_opd', $kode_opd);

                if ($filteredData) {
                    return response()->json([
                        'kode_opd' => $filteredData['kode_opd'] ?? '',
                        'nama_opd' => $filteredData['nama_opd'] ?? '',
                        'nama_kepala_opd' => $filteredData['nama_kepala_opd'] ?? '',
                        'nip_kepala_opd' => $filteredData['nip_kepala_opd'] ?? ''
                    ]);
                } else {
                    return response()->json(['message' => 'No data found for the specified kode_opd'], 404);
                }
            } else {
                return response()->json(['message' => 'Failed to fetch data'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    public function edit($id)
    {

        $userKodeOpd = Auth::user()->kode_opd;

        $bab8 = Bab8::with('jenis', 'tahun')
            ->where('kode_opd', $userKodeOpd)
            ->findOrFail($id);

        $api = new KakKotaMadiunApi();

        try {
            $urusan_opd = $api->urusanOpd();
            $results = $urusan_opd->json()['results'] ?? [];
            // $kodeOpds = collect($results)->pluck('kode_opd')->unique();
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

        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        return view('layouts.opd.renstra.bab8.edit', compact('bab8', 'kodeOpds', 'jenis', 'tahun', 'userKodeOpd'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_bab' => 'required|string|max:255',
            // 'jenis_id' => 'required|integer|exists:jenis,id',
            'tahun_id' => 'required|integer|exists:tahun_dokumen,id',
            'kode_opd' => 'required|string|max:50',
            'nama_kepala_opd' => 'required|string|max:255',
            'nip_kepala_opd' => 'required|string|max:50',
            'tanggal' => 'required',
            'uraian' => 'nullable|string',
            'pangkat_kepala_opd' => 'nullable|string',
        ]);

        try {
            $bab8 = Bab8::findOrFail($id);
            $bab8->update($validatedData); // Update the record with new data
            return redirect()->route('layouts.opd.bab8.index')->with('success', 'Data has been updated successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to update Bab8 record:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors('Failed to update data.');
        }
    }


    public function destroy($id)
    {
        $bab8 = Bab8::findOrFail($id);
        $bab8->delete();

        return redirect()->route('layouts.opd.bab8.index')->with('success', 'BAB 8 deleted successfully');
    }
    public function show($id)
    {
        $bab8 = Bab8::findOrFail($id);

        $opdDetails = $this->findOpd($bab8->kode_opd);

        $opdData = json_decode($opdDetails->content(), true);
        $nama_opd = $opdData['nama_opd'] ?? null;
        $nama_kepala_opd = $opdData['nama_kepala_opd'] ?? null;
        $nip_kepala_opd = $opdData['nip_kepala_opd'] ?? null;

        return view('layouts.opd.renstra.bab8.show', compact('bab8', 'nama_opd', 'nama_kepala_opd', 'nip_kepala_opd'));
    }


    // public function show($id)
    // {
    //     $bab8 = Bab8::findOrFail($id);
    //     $api = new KakKotaMadiunApi();
    //     $opdDetails = $this->findOpd($bab8->kode_opd);
    //     $opdData = json_decode($opdDetails->content(), true); // decode the JSON response

    //     return view('layouts.admin.bab8.show', compact('bab8', 'nama_opd', 'tujuan_opd', 'sasaran_opd'));
    // }

    public function exportPdf($id)
    {
        try {
            $bab8 = Bab8::findOrFail($id);

            $opdDetails = $this->findOpd($bab8->kode_opd);

            $opdData = json_decode($opdDetails->content(), true);

            $pdfContent = view('layouts.opd.renstra.bab8.pdf', [
                'bab8' => $bab8,
                'nama_opd' => $opdData['nama_opd'] ?? null,
                'nama_kepala_opd' => $opdData['nama_kepala_opd'] ?? null,
                'nip_kepala_opd' => $opdData['nip_kepala_opd'] ?? null,
            ])->render();

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

            $mpdf->WriteHTML($pdfContent);
            $filename = "Bab8_{$bab8->id}.pdf";
            $mpdf->Output($filename, 'I');
        } catch (\Exception $e) {
            \Log::error('Failed to generate PDF:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Unable to generate PDF'], 500);
        }
    }
}
