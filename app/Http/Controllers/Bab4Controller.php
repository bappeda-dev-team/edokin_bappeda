<?php

namespace App\Http\Controllers;

use App\Models\Bab4;
use App\Models\Jenis;
use App\Models\TahunDokumen;
use Illuminate\Http\Request;
use App\Http\Api\KakKotaMadiunApi;
use Illuminate\Support\Facades\Log;

class Bab4Controller extends Controller
{
    // Display a list of Bab4 records
    public function index()
    {
        $bab4 = Bab4::with('jenis')->get();
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

        return view('layouts.admin.bab4.index', compact('bab4', 'jenis', 'urusan_opd', 'tahun', 'kodeOpds'));
    }

    // Show form to create a new Bab4 record
    public function create()
    {
        $api = new KakKotaMadiunApi();

        try {
            $urusan_opd = $api->urusanOpd();
            $results = $urusan_opd->json()['results'] ?? [];
            $kodeOpds = collect($results)->pluck('kode_opd')->unique();
        } catch (\Exception $e) {
            Log::error('Failed to fetch Urusan OPD for create form:', ['error' => $e->getMessage()]);
            $kodeOpds = collect();
        }

        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        return view('layouts.admin.bab4.create', compact('kodeOpds', 'jenis', 'tahun'));
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


    // Store a new Bab4 record in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_bab' => 'required|string|max:255',
            'jenis_id' => 'required|integer|exists:jenis,id',
            'tahun_id' => 'required|integer|exists:tahun_dokumen,id',
            'kode_opd' => 'required|string|max:50',
            'nama_opd' => 'nullable|string|max:255',
            'tujuan_opd' => 'nullable|string',
            'sasaran_opd' => 'nullable|string',
        ]);

        try {
            Bab4::create($validatedData);
            return redirect()->route('bab4.index')->with('success', 'Data has been saved successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to store Bab4 record:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors('Failed to save data.');
        }
    }

    // Show form to edit an existing Bab4 record
    public function edit($id)
    {
        $bab4 = Bab4::findOrFail($id);
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $api = new KakKotaMadiunApi();

        try {
            $urusan_opd = $api->urusanOpd();
            $kodeOpds = collect($urusan_opd->json())->pluck('kode_opd')->unique();
        } catch (\Exception $e) {
            Log::error('Failed to fetch Urusan OPD for edit form:', ['error' => $e->getMessage()]);
            $kodeOpds = collect();
        }

        return view('layouts.admin.bab4.edit', compact('bab4', 'jenis', 'tahun', 'kodeOpds'));
    }

    // Update an existing Bab4 record in the database
    public function update(Request $request, $id)
    {
        $bab4 = Bab4::findOrFail($id);

        $validatedData = $request->validate([
            'nama_bab' => 'required|string|max:255',
            'jenis_id' => 'required|integer|exists:jenis,id',
            'tahun_id' => 'required|integer|exists:tahun_dokumen,id',
            'kode_opd' => 'required|string|max:50',
            'nama_opd' => 'nullable|string|max:255',
            'tujuan_opd' => 'nullable|string',
            'sasaran_opd' => 'nullable|string',
        ]);

        try {
            $bab4->update($validatedData);
            return redirect()->route('bab4.index')->with('success', 'Data has been updated successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to update Bab4 record:', ['id' => $id, 'error' => $e->getMessage()]);
            return redirect()->back()->withErrors('Failed to update data.');
        }
    }
    public function show()
    {
    
       
        return view('layouts.admin.bab4.show');
    }
}
