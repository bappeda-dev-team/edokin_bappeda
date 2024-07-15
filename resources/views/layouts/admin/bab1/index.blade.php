@extends('layouts.admin.main')

@section('title', 'Dashboard E-DOKIN')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>BAB I</h1>
    </div>
    <a href="{{ route('bab1.create') }}">
        <button class="btn btn-primary">Tambah <i class="fas fa-plus-circle"></i></button>
    </a>
    <div class="card-body">
        @foreach($bab1 as $bab_1)
        <div class="mb-4">
            {{-- <h5>1.1 Latar Belakang</h5> --}}
            <p>{!! $bab_1->latar_belakang !!}</p>
            {{-- <h5>1.2 Dasar Hukum Penyusunan</h5> --}}
            <p>{!! $bab_1->dasar_hukum !!}</p>
            {{-- <h5>1.3 Maksud dan Tujuan</h5> --}}
            <p>{!! $bab_1->maksud_tujuan !!}</p>
            {{-- <h5>1.4 Sistematika Penulisan</h5> --}}
            <p>{!! $bab_1->sistematika_penulisan !!}</p>
            <div class="d-flex justify-content-center">
              <a href="{{ route('bab1.edit', $bab_1->id) }}" class="btn btn-warning mx-2">Edit <i class="fas fa-edit"></i></a>
              <form action="{{ route('bab1.destroy', $bab_1->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger mx-2">Hapus <i class="fas fa-trash"></i></button>
              </form>
          </div>
        @endforeach
    </div>
</section>
@endsection
