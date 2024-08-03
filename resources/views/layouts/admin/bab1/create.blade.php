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
                <a href="{{ route('layouts.admin.bab1.index') }}">
                    <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back </button>
                </a>
                <form action="{{ route('bab1.store') }}" method="POST">
                    @csrf
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama Bab</label>
                        <div class="col-sm-12 col-md-4">
                            <input type="text" name="nama_bab" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Jenis</label>
                        <div class="col-sm-12 col-md-4">
                            <select name="jenis_id" class="form-control selectric" required>
                                <option value="">Pilih Jenis</option>
                                @foreach($jenis as $item)
                                    <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Tahun</label>
                        <div class="col-sm-12 col-md-4">
                            <select name="tahun_id" class="form-control selectric" required>
                                <option value="">Pilih Tahun</option>
                                @foreach($tahun as $year)
                                    <option value="{{ $year->id }}">{{ $year->tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Kode OPD</label>
                        <div class="col-sm-12 col-md-4">
                            <select name="kode_opd" class="form-control selectric" required>
                                <option value="">Pilih Kode OPD</option>
                                @foreach($urusan_opd as $opd)
                                    <option value="{{ $opd['kode_opd'] }}">{{ $opd['kode_opd'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">1.1 Latar Belakang</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="latar_belakang" class="summernote"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">1.2 Dasar Hukum Penyusunan</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="dasar_hukum" class="summernote"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">1.3 Maksud dan Tujuan</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="maksud_tujuan" class="summernote"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">1.4 Sistematika Penulisan</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="sistematika_penulisan" class="summernote"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-success btn-lg mx-2">Submit</button>
                            <a href="{{ route('layouts.admin.bab1.index') }}" class="btn btn-danger btn-lg mx-2">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,   // set the height of the editor
            minHeight: null, // set minimum height of the editor
            maxHeight: null, // set maximum height of the editor
            focus: true     // set focus to editable area after initializing summernote
        });
    });
</script>
@endsection
