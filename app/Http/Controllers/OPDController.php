<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OPDController extends Controller
{
    public function perangkat()
    {
        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->post($apiUrl);

        if ($response->successful()) {
            $urusan_opd = $response->json();
            $urusan_opd = $urusan_opd['results'] ?? [];
        } else {
            \Log::error('Failed to fetch Urusan OPD data: ' . $response->body());
            $urusan_opd = []; // Initialize as empty array in case of failure
        }

        // Use compact() to pass the variable to the view
        return view('layouts.admin.perangkat.index', compact('urusan_opd'));
    }
}
