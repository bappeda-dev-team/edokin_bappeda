<?php

namespace App\Http\Api;

use Illuminate\Support\Facades\Http;

class KakKotaMadiunApi
{
    private $BASE_URL = "https://kak.madiunkota.go.id/api";

    public function healthCheck()
    {
        $apiUrl = $this->BASE_URL . "/health/index.json";
        $response = Http::get($apiUrl);

        return $response;
    }

   
    public function urusanOpd()
    {
        $apiUrl = $this->BASE_URL . "/opd/urusan_opd.json";
        $response = Http::post($apiUrl);
    
        // Tambahkan log untuk memeriksa respons API
        \Log::info('Urusan OPD API Response:', ['response' => $response->json()]);
    
        return $response;
    }
    

    public function permasalahanOpd($kode_opd, $tahun)
    {
        $apiUrl = $this->BASE_URL . "/programs/permasalahans.json";
        $response = Http::post($apiUrl, [
            'kode_opd' => $kode_opd,
            'tahun' => $tahun
        ]);

        return $response;
    }

    public function tujuanOpd($kode_opd)
    {
        $apiUrl = $this->BASE_URL . "/opd/tujuan_opd.json";
        $response = Http::post($apiUrl, [
            'kode_opd' => $kode_opd
        ]);

        return $response;
    }

    public function sasaranOpd($kode_opd, $tahun)
    {
        $apiUrl = $this->BASE_URL . "/opd/sasaran_opd.json";
        $response = Http::post($apiUrl, [
            'kode_opd' => $kode_opd,
            'tahun' => $tahun
        ]);

        return $response;
    }
}