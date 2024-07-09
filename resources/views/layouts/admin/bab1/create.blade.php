@extends('layouts.admin.main')

@section('title', 'Dashboard E-DOKIN')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>BAB 1</h4>
        </div>
        <div class="card-body">
          {{-- <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">1.1 Latar Belakang</label>
            <div class="col-sm-12 col-md-7"> --}}
                <div class="text-center">
                    <h4>1.1 Latar Belakang</h4>
                  </div>
              <textarea class="summernote"></textarea>
            {{-- </div>
          </div> --}}
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
          </div>
        </div>
        <div class="card-body">
            {{-- <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">1.1 Latar Belakang</label>
              <div class="col-sm-12 col-md-7"> --}}
                  <div class="text-center">
                      <h4>1.2 Dasar Hukum Penyusunan</h4>
                    </div>
                <textarea class="summernote"></textarea>
              {{-- </div>
            </div> --}}
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            </div>
          </div>
          <div class="card-body">
            {{-- <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">1.1 Latar Belakang</label>
              <div class="col-sm-12 col-md-7"> --}}
                  <div class="text-center">
                      <h4>1.3 Maksud dan Tujuan</h4>
                    </div>
                <textarea class="summernote"></textarea>
              {{-- </div>
            </div> --}}
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            </div>
          </div>
          <div class="card-body">
            {{-- <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">1.1 Latar Belakang</label>
              <div class="col-sm-12 col-md-7"> --}}
                  <div class="text-center">
                      <h4>1.4 Sistematika Penulisan</h4>
                    </div>
                <textarea class="summernote"></textarea>
              {{-- </div>
            </div> --}}
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            </div>
          </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button class="btn btn-primary">Publish</button>
                </div>
          </div>
      </div>
      </div>
  </div>
    </div>
  </div>

  @endsection