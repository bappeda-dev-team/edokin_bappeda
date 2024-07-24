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
            'permasalahan_pelayanan' => 'required',
            'isu_strategis' => 'required',
        ]);

        Bab3::create([
            'nama_bab' => $request->nama_bab,
            'jenis_id' => $request->jenis_id,
            'kode_opd' => $request->kode_opd,
            'tahun_id' => $request->tahun_id,
            'permasalahan_pelayanan' => $request->permasalahan_pelayanan,
            'isu_strategis' => $request->isu_strategis,
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
            'permasalahan_pelayanan' => 'required|string',
            'isu_strategis' => 'required|string',
        ]);

        $bab3 = Bab3::findOrFail($id);

        $bab3->update([
            'nama_bab' => $request->nama_bab,
            'jenis_id' => $request->jenis_id,
            'kode_opd' => $request->kode_opd,
            'tahun_id' => $request->tahun_id,
            'permasalahan_pelayanan' => $request->permasalahan_pelayanan,
            'isu_strategis' => $request->isu_strategis,
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
        return view('layouts.admin.bab3.show', compact('bab3'));
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
