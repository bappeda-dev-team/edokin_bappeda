@extends('layouts.admin.main')

@section('title', 'Dashboard E-DOKIN')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>BAB 2</h4>
        </div>
        {{-- <form action="{{ route('bab1.store') }}" method="POST">
          @csrf --}}
          <div class="card-body">
              <div class="text-center">
                  <h4>2.1 Tugas, Fungsi dan Struktur Organisasi Perangkat Daerah</h4>
              </div>
              <textarea name="latar_belakang" class="summernote"></textarea>
          </div>
          <div class="card-body">
              <div class="text-center">
                  <h4>2.2 Sumber Daya Perangkat Daerah</h4>
              </div>
              <textarea name="dasar_hukum" class="summernote"></textarea>
          </div>
          <div class="card-body">
              <div class="text-center">
                  <h4>2.3 Kinerja Pelayanan Perangkat Daerah</h4>
              </div>
              <textarea name="maksud_tujuan" class="summernote"></textarea>
          </div>
          <div class="card-body">
              <div class="text-center">
                  <h4>2.4 Kelompok Sasaran Layanan</h4>
              </div>
              <textarea name="sistematika_penulisan" class="summernote"></textarea>
          </div>
          <div class="form-group row mb-4">
              <div class="col-12 d-flex justify-content-center align-items-center">
                  <button type="submit" class="btn btn-success btn-lg mx-2">Submit</button>
                  <a href="{{ route('layouts.admin.bab2.index') }}" class="btn btn-danger btn-lg mx-2">Cancel</a>
              </div>
          </div>
      </form>
      </div>
      </div>
  </div>
    </div>
  </div>

  @endsection