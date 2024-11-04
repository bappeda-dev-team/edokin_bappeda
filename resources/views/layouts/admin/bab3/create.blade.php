@extends('layouts.admin.main')

@section('title', 'Dashboard E-DOKIN')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>BAB 3</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('layouts.admin.bab3.index') }}">
                    <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back </button>
                </a>
                <form action="{{ route('bab3.store') }}" method="POST">
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
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama OPD</label>
                        <div class="col-sm-12 col-md-4">
                            <select name="kode_opd" class="form-control select2" required>
                                <option value="">Pilih Nama OPD</option>
                                @foreach($data_opd as $opd)
                                    <option value="{{ $opd['kode_opd'] }}">{{ $opd['nama_opd'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama OPD</label>
                        <div class="col-sm-12 col-md-4"> --}}
                            <input type="hidden" name="nama_opd" id="nama_opd" class="form-control" readonly>
                        {{-- </div>
                    </div> --}}

                    {{-- <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.1 Permasalahan Pelayanan Perangkat Daerah</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="permasalahan_pelayanan" class="summernote"></textarea>
                        </div>
                    </div> --}}
                    
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Uraian 1)</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="uraian1" class="summernote"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Uraian 2)</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="uraian2" class="summernote"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Uraian 3)</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="uraian3" class="summernote"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Uraian 4)</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="uraian4" class="summernote"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Uraian 5)</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="uraian5" class="summernote"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Isu Strategis 1)</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="isu_strategis1" class="summernote"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Isu Strategis 2)</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="isu_strategis2" class="summernote"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Uraian (opsional)</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="uraian" class="summernote"></textarea>
                        </div>
                    </div>

                    

                    <div class="form-group row mb-4">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-success btn-lg mx-2">Submit</button>
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
        // Initialize Select2
        $('.select2').select2({
            placeholder: 'Pilih Nama OPD',
            allowClear: true,
            width: '100%'
        });
    
        // Event listener for Select2 change event
        $('.select2').on('change', function () {
            const kodeOpd = $(this).val();
            const namaOpdInput = $('#nama_opd');
            
            if (kodeOpd) {
                // Fetch data from API using the selected kode_opd
                fetch(`/api/urusan_opd/${kodeOpd}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            console.error('API Error:', data.error);
                            namaOpdInput.val('');
                        } else {
                            // Populate nama_opd
                            namaOpdInput.val(data.nama_opd || '');
                        }
                    })
                    .catch(error => {
                        console.error('Fetch Error:', error);
                        namaOpdInput.val('');
                    });
            } else {
                // Clear fields if no kode_opd selected
                namaOpdInput.val('');
            }
        });

        // Initialize Summernote
        $('.summernote').summernote({
            height: 300,
            minHeight: null,
            maxHeight: null,
            focus: true
        });
    });
</script>
@endsection
Perbaikan yan
