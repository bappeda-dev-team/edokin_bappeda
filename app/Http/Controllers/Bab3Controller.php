<?php

namespace App\Http\Controllers;

use App\Models\Bab3;
use App\Models\Jenis;
use App\Models\TahunDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/daftar_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        $data_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];

        return view('layouts.admin.bab3.index', compact('bab3', 'jenis', 'data_opd', 'tahun'));
    }

    public function create()
    {
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/daftar_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        $data_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];

        return view('layouts.admin.bab3.create', compact('jenis', 'data_opd', 'tahun'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bab' => 'required',
            'jenis_id' => 'required',
            'kode_opd' => 'required|string',
            'tahun_id' => 'required',
            'uraian1'  => 'required',
            'uraian2' => 'required',
            'uraian3' => 'required',
            'uraian4' => 'required',
            'uraian5' => 'required',
            'isu_strategis1' => 'required',
            'isu_strategis2' => 'required',
        ]);

        Bab3::create([
            'nama_bab' => $request->nama_bab,
            'jenis_id' => $request->jenis_id,
            'kode_opd' => $request->kode_opd,
            'tahun_id' => $request->tahun_id,
            'uraian1' => $request->uraian1,
            'uraian2' => $request->uraian2,
            'uraian3' => $request->uraian3,
            'uraian4' => $request->uraian4,
            'uraian5' => $request->uraian5,
            'isu_strategis1' => $request->isu_strategis1,
            'isu_strategis2' => $request->isu_strategis2,
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
            'jenis_id' => 'required|exists:jenis,id',
            'kode_opd' => 'required|string',
            'tahun_id' => 'required|exists:tahun_dokumen,id',
            'uraian1'  => 'required|string',
            'uraian2' => 'required|string',
            'uraian3' => 'required|string',
            'uraian4' => 'required|string',
            'uraian5' => 'required|string',
            'isu_strategis1' => 'required|string',
            'isu_strategis2' => 'required|string',
        
        ]);

        $bab3 = Bab3::findOrFail($id);

        $bab3->update([
            'nama_bab' => $request->nama_bab,
            'jenis_id' => $request->jenis_id,
            'kode_opd' => $request->kode_opd,
            'tahun_id' => $request->tahun_id,
            'uraian1' => $request->uraian1,
            'uraian2' => $request->uraian2,
            'uraian3' => $request->uraian3,
            'uraian4' => $request->uraian4,
            'uraian5' => $request->uraian5,
            'isu_strategis1' => $request->isu_strategis1,
            'isu_strategis2' => $request->isu_strategis2,
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
    
        return view('layouts.admin.bab3.show', [
            'bab3' => $bab3,
            'urusan_opd' => $urusan_opd,
            'selectedBidangUrusan' => $selectedBidangUrusan,
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

        // Render HTML view
        $html = view('layouts.admin.bab3.pdf', compact('bab3', 'urusan_opd'))->render();

        // Initialize MPDF
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
            'tempDir' => storage_path('app/temp'),
        ]);

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


    
    // public function exportPdf($id)
    // {
    //     $bab3 = Bab3::findOrFail($id);
    //     $pdf = PDF::loadView('layouts.admin.bab3.pdf', compact('bab3'));
    //     return $pdf->download('bab3-' . $id . '.pdf');
    // }

    // public function exportWord($id)
    // {
    //     $bab3 = Bab3::findOrFail($id);

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
