@extends('layouts.opd.main')

@section('title', 'Create BAB 5')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create BAB 5</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('layouts.opd.bab5.index') }}">
                        <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back </button>
                    </a>
                    <form action="{{ route('opd.bab5.store') }}" method="POST">
                        @csrf

                        <!-- Nama Bab Field -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama Bab</label>
                            <div class="col-sm-12 col-md-4">
                                <input type="text" name="nama_bab" class="form-control" value="{{ old('nama_bab') }}"
                                    required>
                                @error('nama_bab')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Tahun Field -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Periode</label>
                            <div class="col-sm-12 col-md-4">
                                <select name="tahun_id" id="tahun_id" class="form-control selectric" required>
                                    <option value="">Pilih Periode</option>
                                    @foreach ($tahun as $year)
                                        <option value="{{ $year->id }}" data-tahun="{{ $year->tahun }}">
                                            {{ $year->tahun }}
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
                                <input type="hidden" name="kode_opd" id="kode_opd" class="form-control" required>
                                <input type="text" name="nama_opd" id="nama_opd" class="form-control" readonly>
                            </div>
                        </div>

                        <!-- Nama OPD Field -->
                        {{-- <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama OPD</label>
                            <div class="col-sm-12 col-md-4"> --}}
                        {{-- <input type="hidden" id="nama_opd" name="nama_opd" class="form-control" readonly> --}}
                        {{-- </div>
                        </div> --}}

                        <!-- Tujuan OPD Field -->
                        {{-- <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Tujuan OPD</label>
                        <div class="col-sm-12 col-md-4">
                            <textarea id="tujuan_opd" name="tujuan_opd" class="form-control" rows="4" readonly></textarea>
                        </div>
                    </div> --}}

                        <!-- Sasaran OPD Field -->
                        {{-- <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Sasaran OPD</label>
                        <div class="col-sm-12 col-md-4">
                            <textarea id="sasaran_opd" name="sasaran_opd" class="form-control" rows="4" readonly></textarea>
                        </div>
                    </div> --}}

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Visi dan Misi</label>
                            <div class="col-sm-12 col-md-10">
                                <table>
                                    <!-- VISI -->
                                    <tr>
                                        <th colspan="4">VISI:</th>
                                    </tr>

                                    <!-- MISI 1 -->
                                    <tr>
                                        <th colspan="4">MISI 1:</th>
                                    </tr>
                                    <tr>
                                        <th>Tujuan</th>
                                        <th>Sasaran</th>
                                        <th>Strategi</th>
                                        <th>Arah Kebijakan</th>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div id="tujuan_opd-rows"></div>
                                        </td>
                                        <td>
                                            <div id="sasaran_opd-rows"></div>
                                        </td>
                                        <td>
                                            <div id="strategi-rows"></div>
                                        </td>
                                        <td>
                                            <div id="arah_kebijakan-rows"></div>
                                        </td>
                                    </tr>
                                    {{-- </tbody> --}}
                                </table>
                                {{-- <button id="add-row" type="button" class="btn btn-primary mt-3">Tambah Data</button> --}}
                                <button id="add-tujuan" type="button" class="btn btn-primary mt-3">Tambah Tujuan</button>
                                <button id="add-sasaran" type="button" class="btn btn-primary mt-3">Tambah Sasaran</button>
                                <button id="add-strategi" type="button" class="btn btn-primary mt-3">Tambah
                                    Strategi</button>
                                <button id="add-kebijakan" type="button" class="btn btn-primary mt-3">Tambah Arah
                                    Kebijakan</button>
                            </div>
                        </div>



                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Uraian Paragraf Akhir (opsional)</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian" class="summernote"></textarea>
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

            // Event handler for when the value of select2 changes
            // $('.select2').on('change', function() {
            const kodeOpd = $('#kode_opd').val();
            const namaOpdInput = $('#nama_opd');

            if (kodeOpd) {
                // Call your API to fetch nama OPD and bidang urusan based on selected kode OPD
                fetch(`/api/urusan_opd/${kodeOpd}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('API Response:', data); // Debug: log API response
                        if (data.error) {
                            console.error('API Error:', data.error);
                            namaOpdInput.val(''); // Clear nama OPD input
                        } else {
                            // Set the input values based on the API response
                            namaOpdInput.val(data.nama_opd ||
                                ''); // Set nama OPD                      
                        }
                    })
                    .catch(error => {
                        console.error('Fetch Error:', error);
                        namaOpdInput.val('');
                    });
            } else {
                namaOpdInput.val('');
            }
            // });

            function addRowToCategory(category, value = '') {
                const newRow = `<div >
            <textarea name="${category}[]" >${value}</textarea>
        </div>`;
                $(`#${category}-rows`).append(newRow);
            }

            $('#add-tujuan').on('click', function() {
                addRowToCategory('tujuan_opd');
            });

            $('#add-sasaran').on('click', function() {
                addRowToCategory('sasaran_opd');
            });

            $('#add-strategi').on('click', function() {
                addRowToCategory('strategi');
            });

            $('#add-kebijakan').on('click', function() {
                addRowToCategory('arah_kebijakan');
            });

            $('#tahun_id, #kode_opd').on('change', function() {
                const kodeOpd = $('#kode_opd').val();
                const tahun = $('#tahun_id').find(':selected').data('tahun');

                if (kodeOpd && tahun) {
                    fetch(`/api/strategi-arah-kebijakan/${tahun}/${kodeOpd}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log('API Response:', data);
                            $('#tujuan_opd-rows').empty();
                            $('#sasaran_opd-rows').empty();
                            $('#strategi-rows').empty();
                            $('#arah_kebijakan-rows').empty();

                            // Add initial rows based on fetched data
                            addRowToCategory('tujuan_opd', data.tujuan_opd || '');
                            const sasaranOpd = data.sasaran_opd || [];
                            sasaranOpd.forEach(sasaran => addRowToCategory('sasaran_opd', sasaran));
                            addRowToCategory('strategi', data.strategi || '');
                            const arahKebijakan = data.arah_kebijakan || [];
                            arahKebijakan.forEach(kebijakan => addRowToCategory('arah_kebijakan',
                                kebijakan));
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                            alert('Terjadi kesalahan saat mengambil data.');
                        });
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
        document.addEventListener('DOMContentLoaded', function() {
            var userKodeOpd = @json($userKodeOpd);
            var urusanOpd = @json($kodeOpds);
            if (userKodeOpd) {
                var selectedOpd = urusanOpd.find(function(opd) {
                    return opd.kode_opd === userKodeOpd;
                });

                if (selectedOpd) {
                    document.getElementById('nama_opd').value = selectedOpd.nama_opd;
                    document.getElementById('kode_opd').value = selectedOpd.kode_opd;
                }
            }

            document.getElementById('kode_opd').addEventListener('change', function() {
                var selectedOpdCode = this.value;
                var selectedOpd = urusanOpd.find(function(opd) {
                    return opd.kode_opd === selectedOpdCode;
                });

                if (selectedOpd) {
                    document.getElementById('nama_opd').value = selectedOpd.nama_opd;
                    document.getElementById('kode_opd').value = selectedOpd.kode_opd;
                }
            });
        });
    </script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
@endsection
