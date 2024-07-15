@extends('layouts.admin.main')

@section('title', 'Dashboard E-DOKIN')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Edit BAB 1</h4>
        </div>
        <form action="{{ route('bab1.update', $bab1->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="card-body">
              <div class="text-center">
                  <h4>1.1 Latar Belakang</h4>
              </div>
              <textarea name="latar_belakang" class="summernote">{{ $bab1->latar_belakang }}</textarea>
          </div>
          <div class="card-body">
              <div class="text-center">
                  <h4>1.2 Dasar Hukum Penyusunan</h4>
              </div>
              <textarea name="dasar_hukum" class="summernote">{{ $bab1->dasar_hukum }}</textarea>
          </div>
          <div class="card-body">
              <div class="text-center">
                  <h4>1.3 Maksud dan Tujuan</h4>
              </div>
              <textarea name="maksud_tujuan" class="summernote">{{ $bab1->maksud_tujuan }}</textarea>
          </div>
          <div class="card-body">
              <div class="text-center">
                  <h4>1.4 Sistematika Penulisan</h4>
              </div>
              <textarea name="sistematika_penulisan" class="summernote">{{ $bab1->sistematika_penulisan }}</textarea>
          </div>
          <div class="form-group row mb-4">
              <div class="col-12 d-flex justify-content-center align-items-center">
                  <button type="submit" class="btn btn-success btn-lg mx-2">Update</button>
                  <a href="{{ route('layouts.admin.bab1.index') }}" class="btn btn-danger btn-lg mx-2">Cancel</a>
              </div>
          </div>
      </form>
      </div>
      </div>
  </div>
</div>

@endsection
