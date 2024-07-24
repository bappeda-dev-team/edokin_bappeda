<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PegawaiController extends Controller
{
    public function pegawai()
    {
        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/daftar_pegawai';
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->post($apiUrl, [
                'kode_opd' => '5.01.5.05.0.00.02.0000',
                'tahun' => 2024,
            ]);
           

        $data = json_decode($response->getBody(), true);
        
        // Filter only required fields
        $filteredData = array_map(function ($pegawai) {
            return [
                'nama' => $pegawai['nama'],
                'jabatan' => $pegawai['jabatan'],
                'pangkat' => $pegawai['pangkat'],
                'nip' => $pegawai['nip'],
                'unit_name' => $pegawai['unit_name'],
            ];
        }, $data['data']);

        return view('layouts.admin.pegawai.index', ['filteredData' => $filteredData]);
    }
}