@extends('layouts.admin.main')

@section('title', 'Edit BAB 3')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit BAB 3</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('layouts.admin.bab3.index') }}">
                        <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back </button>
                    </a>
                    <form action="{{ route('bab3.update', $bab3->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Form Fields -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama Bab</label>
                            <div class="col-sm-12 col-md-4">
                                <input type="text" name="nama_bab" class="form-control"
                                    value="{{ old('nama_bab', $bab3->nama_bab) }}" required>
                            </div>
                        </div>

                        {{-- <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Jenis</label>
                    <div class="col-sm-12 col-md-4">
                        <select name="jenis_id" class="form-control selectric" required>
                            <option value="">Pilih Jenis</option>
                            @foreach ($jenis as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $bab3->jenis_id ? 'selected' : '' }}>{{ $item->jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Periode</label>
                            <div class="col-sm-12 col-md-4">
                                <select name="tahun_id" id="tahun_id" class="form-control selectric" required>
                                    <option value="">Pilih Periode</option>
                                    @foreach ($tahun as $year)
                                        <option value="{{ $year->id }}" data-tahun="{{ $year->tahun }}"
                                            {{ $year->id == $bab3->tahun_id ? 'selected' : '' }}>{{ $year->tahun }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Lama Periode</label>
                            <div class="col-sm-12 col-md-4">
                                <input type="text" name="lama_periode" class="form-control"
                                    value="{{ old('lama_periode', $bab3->lama_periode) }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama OPD</label>
                            <div class="col-sm-12 col-md-4">
                                <select name="kode_opd" class="form-control selectric select2" required>
                                    <option value="">Pilih Nama OPD</option>
                                    @foreach ($data_opd as $opd)
                                        <option value="{{ $opd['kode_opd'] }}"
                                            {{ $opd['kode_opd'] == $bab3->kode_opd ? 'selected' : '' }}>
                                            {{ $opd['nama_opd'] }}</option>
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
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Gambar Pelayanan Perangkat
                                Daerah</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian1" class="summernote">{{ old('uraian1', $bab3->uraian1) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Sasaran Jangka Menengah
                                pada Renstra Kementerian/Lembaga</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian2" class="summernote">{{ old('uraian2', $bab3->uraian2) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Sasaran Jangka Menengah
                                dari Renstra Perangkat Daerah Provinsi</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian3" class="summernote">{{ old('uraian3', $bab3->uraian3) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Implikasi RTRW bagi
                                Pelayanan Perangkat Daerah</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian4" class="summernote">{{ old('uraian4', $bab3->uraian4) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Implikasi KLHS bagi
                                Pelayanan Perangkat Daerah</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian5" class="summernote">{{ old('uraian5', $bab3->uraian5) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Isu
                                Strategis)</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="isu_strategis[]" id="isu_strategis" class="summernote" rows="4">{{ old('isu_strategis', implode("\n", json_decode($bab3->isu_strategis, true) ?? [])) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Uraian Paragraf Akhir
                                (opsional)</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian" class="summernote">{{ old('uraian',($bab3->uraian)) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-success btn-lg mx-2">Update</button>
                                <a href="{{ route('layouts.admin.bab3.index') }}"
                                    class="btn btn-danger btn-lg mx-2">Cancel</a>
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
            $('.select2').on('change', function() {
                const kodeOpd = $(this).val();
                const namaOpdInput = $('#nama_opd');

                if (kodeOpd) {
                    // Fetch data from API using the selected kode_opd
                    fetch(`/api/urusan_opd/${kodeOpd}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log('API Response:', data); // Debug: log API response
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

            // $(document).ready(function() {
            $('#isu_strategis').summernote({
                height: 200,
            });

            $('.select2').on('change', function() {
                const kodeOpd = $(this).val();
                const tahun = $('#tahun_id').find(':selected').data('tahun');
                const namaOpdInput = $('#nama_opd');
                const isuStrategisInput = $('#isu_strategis');
                const tahunAkhir = tahun ? tahun.split('-').pop().trim() : '';
                namaOpdInput.val('');
                isuStrategisInput.summernote('code', '');
                if (kodeOpd && tahunAkhir) {
                    lastKodeOpd = kodeOpd;
                    lastTahun = tahunAkhir;
                }

                const fetchKodeOpd = kodeOpd || lastKodeOpd;
                const fetchTahun = tahunAkhir || lastTahun;

                if (fetchKodeOpd && fetchTahun) {
                    fetch(`/api/isu-strategis/${fetchTahun}/${fetchKodeOpd}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log('API Response:', data);
                            if (data.error) {
                                console.error('API Error:', data.error);
                            } else {
                                namaOpdInput.val(data.nama_opd || '');

                                const isuStrategis = data.results || [];
                                const isuStrategisText = isuStrategis.join(
                                    '\n');

                                isuStrategisInput.summernote('code', isuStrategisText
                                    .replace(/\n/g, '<br>')
                                );
                            }
                        })
                        .catch(error => {
                            console.error('Fetch Error:', error);
                        });
                }
            });
            // });


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
