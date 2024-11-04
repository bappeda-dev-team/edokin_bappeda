@extends('layouts.admin.main')

@section('title', 'Edit BAB 3')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit BAB 1</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('layouts.admin.bab3.index') }}">
                    <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back </button>
                </a>
                <form action="{{ route('bab4.update', $bab3->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Form Fields -->
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama Bab</label>
                    <div class="col-sm-12 col-md-4">
                        <input type="text" name="nama_bab" class="form-control" value="{{ old('nama_bab', $bab3->nama_bab) }}" required>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Jenis</label>
                    <div class="col-sm-12 col-md-4">
                        <select name="jenis_id" class="form-control selectric" required>
                            <option value="">Pilih Jenis</option>
                            @foreach($jenis as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $bab3->jenis_id ? 'selected' : '' }}>{{ $item->jenis }}</option>
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
                                <option value="{{ $year->id }}" {{ $year->id == $bab3->tahun_id ? 'selected' : '' }}>{{ $year->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama OPD</label>
                    <div class="col-sm-12 col-md-4">
                        <select name="kode_opd" class="form-control selectric" required>
                            <option value="">Pilih Nama OPD</option>
                            @foreach($data_opd as $opd)
                                <option value="{{ $opd['kode_opd'] }}" {{ $opd['kode_opd'] == $bab3->kode_opd ? 'selected' : '' }}>{{ $opd['nama_opd'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Uncomment if needed --}}
                {{-- <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.1 Permasalahan Pelayanan Perangkat Daerah</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea name="permasalahan_pelayanan" class="summernote">{{ old('permasalahan_pelayanan', $bab3->permasalahan_pelayanan) }}</textarea>
                    </div>
                </div> --}}
                
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Uraian 1)</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea name="uraian1" class="summernote">{{ old('uraian1', $bab3->uraian1) }}</textarea>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Uraian 2)</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea name="uraian2" class="summernote">{{ old('uraian2', $bab3->uraian2) }}</textarea>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Uraian 3)</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea name="uraian3" class="summernote">{{ old('uraian3', $bab3->uraian3) }}</textarea>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Uraian 4)</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea name="uraian4" class="summernote">{{ old('uraian4', $bab3->uraian4) }}</textarea>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Uraian 5)</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea name="uraian5" class="summernote">{{ old('uraian5', $bab3->uraian5) }}</textarea>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Isu Strategis 1)</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea name="isu_strategis1" class="summernote">{{ old('isu_strategis1', $bab3->isu_strategis1) }}</textarea>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Isu Strategis 2)</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea name="isu_strategis2" class="summernote">{{ old('isu_strategis2', $bab3->isu_strategis2) }}</textarea>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-success btn-lg mx-2">Update</button>
                        <a href="{{ route('layouts.admin.bab3.index') }}" class="btn btn-danger btn-lg mx-2">Cancel</a>
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
