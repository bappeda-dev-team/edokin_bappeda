@extends('layouts.opd.main')

@section('title', 'Create BAB 8')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create BAB 8</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('layouts.opd.bab8.index') }}">
                        <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back </button>
                    </a>
                    <form action="{{ route('opd.bab8.update', $bab8->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Nama Bab Field -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama Bab</label>
                            <div class="col-sm-12 col-md-4">
                                <input type="text" name="nama_bab" class="form-control"
                                    value="{{ old('nama_bab', $bab8->nama_bab) }}" required>
                                @error('nama_bab')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Jenis Field -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Jenis</label>
                            <div class="col-sm-12 col-md-4">
                                <select name="jenis_id" class="form-control selectric" required>
                                    <option value="">Pilih Jenis</option>
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $bab8->jenis_id == $item->id ? 'selected' : '' }}>{{ $item->jenis }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jenis_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Tahun Field -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Tahun</label>
                            <div class="col-sm-12 col-md-4">
                                <select name="tahun_id" class="form-control selectric" required>
                                    <option value="">Pilih Tahun</option>
                                    @foreach ($tahun as $year)
                                        <option value="{{ $year->id }}" data-tahun="{{ $year->tahun }}"
                                            {{ $bab8->tahun_id == $year->id ? 'selected' : '' }}>{{ $year->tahun }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tahun_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Kode OPD Field -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama OPD</label>
                            <div class="col-sm-12 col-md-4">
                                <select id="kode_opd" name="kode_opd" class="form-control select2">
                                    <option value="">Pilih Nama OPD</option>
                                    @foreach ($kodeOpds as $opd)
                                        <option value="{{ $opd['kode_opd'] }}"
                                            {{ $bab8->kode_opd == $opd['kode_opd'] ? 'selected' : '' }}>
                                            {{ $opd['nama_opd'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama Kepala OPD</label>
                            <div class="col-sm-12 col-md-4">
                                <input type="text" id="nama_kepala_opd" name="nama_kepala_opd" class="form-control" value="{{ old('nama_kepala_opd', $bab8->nama_kepala_opd) }}"
                                    readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">NIP Kepala OPD</label>
                            <div class="col-sm-12 col-md-4">
                                <input type="text" id="nip_kepala_opd" name="nip_kepala_opd" class="form-control" value="{{ old('nip_kepala_opd', $bab8->nip_kepala_opd) }}"
                                    readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Tanggal</label>
                            <div class="col-sm-12 col-md-4">
                                <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ old('tanggal', $bab8->tanggal) }}">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Uraian</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian" class="summernote">{{ old('uraian', $bab8->uraian) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-sm-12 col-md-4 offset-md-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
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

            $('#kode_opd').on('change', function() {
                const kodeOpd = $(this).val();

                if (kodeOpd) {
                    fetch(`/api/find-opd/${kodeOpd}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data) {
                                $('#nama_kepala_opd').val(data.nama_kepala_opd || 'Not available');
                                $('#nip_kepala_opd').val(data.nip_kepala_opd || 'Not available');
                            } else {
                                $('#nama_kepala_opd').val('Not available');
                                $('#nip_kepala_opd').val('Not available');
                            }
                        })
                        .catch(error => {
                            console.error('Fetch Error:', error);
                            $('#nama_kepala_opd').val('Not available');
                            $('#nip_kepala_opd').val('Not available');
                        });
                } else {
                    $('#nama_kepala_opd').val('');
                    $('#nip_kepala_opd').val('');
                }
            });


            // Initialize Summernote for all elements with the class 'summernote'
            $('.summernote').summernote({
                height: 300, // set the height of the editor
                minHeight: null, // set minimum height of the editor
                maxHeight: null, // set maximum height of the editor
                focus: true // set focus to editable area after initializing summernote
            });
        });
    </script>
@endsection
