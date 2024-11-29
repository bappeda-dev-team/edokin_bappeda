@extends('layouts.admin.main')

@section('title', 'Dashboard E-DOKIN')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    @if(Auth::user()->role == 'admin')
        {{-- Dashboard untuk Admin --}}
        <h5>Selamat datang di Dashboard Admin</h5>
        <p>Ini adalah halaman khusus untuk Admin.</p>
        @elseif(Auth::user()->role == 'opd')
        {{-- Dashboard untuk OPD --}}
        <h5>Selamat datang di Dashboard OPD</h5>
        <p>Kode OPD Anda: {{ $kode_opd }}</p>
    @else
        {{-- Role tidak dikenali --}}
        <p>Anda tidak memiliki akses ke dashboard ini.</p>
    @endif
</section>
@endsection
