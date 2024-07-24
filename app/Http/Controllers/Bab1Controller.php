<?php

namespace App\Http\Controllers;

use App\Models\Bab1;
use App\Models\Jenis;
use App\Models\TahunDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Barryvdh\DomPDF\Facade as PDF; // Pastikan penggunaan facade yang benar
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use ZipArchive;



class Bab1Controller extends Controller
{
    public function index()
    {
        $bab1 = Bab1::with('jenis')->get();
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all(); // Pastikan menggunakan TahunDokumen

        // Fetch Kode OPD data from API
        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/daftar_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        $data_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];

        return view('layouts.admin.bab1.index', compact('bab1', 'jenis', 'data_opd', 'tahun'));
    }

    public function create()
    {
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/daftar_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        $data_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];

        return view('layouts.admin.bab1.create', compact('jenis', 'data_opd', 'tahun'));
    }

    public function store(Request $request)
    {
        // Dump request data for debugging
        // dd($request->all());

        $request->validate([
            'nama_bab' => 'required',
            'jenis_id' => 'required',
            'kode_opd' => 'required|string',
            'tahun_id' => 'required',
            'latar_belakang' => 'required',
            'dasar_hukum' => 'required',
            'maksud_tujuan' => 'required',
            'sistematika_penulisan' => 'required',
        ]);

        Bab1::create([
            'nama_bab' => $request->nama_bab,
            'jenis_id' => $request->jenis_id,
            'kode_opd' => $request->kode_opd,
            'tahun_id' => $request->tahun_id,
            'latar_belakang' => $request->latar_belakang,
            'dasar_hukum' => $request->dasar_hukum,
            'maksud_tujuan' => $request->maksud_tujuan,
            'sistematika_penulisan' => $request->sistematika_penulisan,
        ]);

        return redirect()->route('layouts.admin.bab1.index')->with('success', 'BAB 1 created successfully');
    }

    public function edit($id)
    {
        $bab1 = Bab1::findOrFail($id);
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/daftar_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        $data_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];

        return view('layouts.admin.bab1.edit', compact('bab1', 'jenis', 'data_opd', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama_bab' => 'required|string|max:255',
            'jenis_id' => 'required|exists:jenis,id',
            'kode_opd' => 'required|string',
            'tahun_id' => 'required|exists:tahun_dokumen,id',
            'latar_belakang' => 'required|string',
            'dasar_hukum' => 'required|string',
            'maksud_tujuan' => 'required|string',
            'sistematika_penulisan' => 'required|string',
        ]);

        // Temukan entitas Bab1 yang akan diperbarui
        $bab1 = Bab1::findOrFail($id);

        // Perbarui data Bab1 dengan data yang diterima
        $bab1->update([
            'nama_bab' => $request->nama_bab,
            'jenis_id' => $request->jenis_id,
            'kode_opd' => $request->kode_opd,
            'tahun_id' => $request->tahun_id,
            'latar_belakang' => $request->latar_belakang,
            'dasar_hukum' => $request->dasar_hukum,
            'maksud_tujuan' => $request->maksud_tujuan,
            'sistematika_penulisan' => $request->sistematika_penulisan,
        ]);
        return redirect()->route('layouts.admin.bab1.index')->with('success', 'BAB 1 updated successfully');
    }

    public function destroy($id)
    {
        $bab1 = Bab1::findOrFail($id);
        $bab1->delete();

        return redirect()->route('layouts.admin.bab1.index')->with('success', 'BAB 1 deleted successfully');
    }

    public function show($id)
    {
        $bab1 = Bab1::findOrFail($id);
        return view('layouts.admin.bab1.show', compact('bab1'));
    }
    
    public function exportPdf($id)
    {
        
        $bab1 = Bab1::findOrFail($id);
        // dd($bab1);
        $pdf = PDF::loadView('layouts.admin.bab1.pdf', compact('bab1'));
        return $pdf->download('bab1-' . $id . '.pdf');
    }

    public function exportWord($id)
    {
        $bab1 = Bab1::findOrFail($id);

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // $section->addText('Latar Belakang:');
       
        $section->addText(htmlspecialchars(strip_tags($bab1->latar_belakang)));
        $section->addTextBreak(1);
        
        // $section->addText('Dasar Hukum:');
        
        $section->addText(htmlspecialchars(strip_tags($bab1->dasar_hukum)));
        $section->addTextBreak(1);
        
        // $section->addText('Maksud Tujuan:');
        $section->addText(htmlspecialchars(strip_tags($bab1->maksud_tujuan)));
        $section->addTextBreak(1);
        
        // $section->addText('Sistematika Penulisan:');
        $section->addText(htmlspecialchars(strip_tags($bab1->sistematika_penulisan)));

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $fileName = 'bab1-' . $id . '.docx';
        $tempFile = tempnam(sys_get_temp_dir(), 'bab1') . '.docx';
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}
