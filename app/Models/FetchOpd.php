<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FetchOpd {
  public static function data_opd($kode_opd) {
    // API URL and fetching data
    $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
    $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

    if ($response->successful()) {
        $urusan_opd = $response->json();
    } else {
        abort(500, 'Failed to fetch data from API');
    }

    // Find the selected OPD
    $selectedOpd = null;
    foreach ($urusan_opd["results"] as $opd) {
        if (isset($opd['kode_opd']) && $opd['kode_opd'] == $kode_opd) {
            $selectedOpd = $opd;
            break;
        }
    }

    if (!$selectedOpd) {
        abort(404, 'Selected OPD not found');
    }
    return $selectedOpd;
  }
}