<?php

namespace App\Http\Controllers;
use App\Models\PerangkatOPD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OPDController extends Controller
{
    public function perangkat()
    {
        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/daftar_opd';
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->post($apiUrl);

        if ($response->successful()) {
            $daftar_opd = $response->json();
            if (isset($daftar_opd['results'])) {
                $data_opd = $daftar_opd['results'];
            } else {
                $data_opd = [];
            }
        } else {
            $data_opd = [];
        }

        return view('layouts.admin.perangkat.index', ['data_opd' => $data_opd]);
    }
}
