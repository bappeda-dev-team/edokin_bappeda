@extends('layouts.admin.main')

@section('title', 'Dashboard E-DOKIN')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>BAB 2</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('layouts.admin.bab2.index') }}">
                        <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back </button>
                    </a>
                    <form action="{{ route('bab2.store') }}" method="POST">
                        @csrf
                        <!-- Form Fields -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama Bab</label>
                            <div class="col-sm-12 col-md-4">
                                <input type="text" name="nama_bab" class="form-control" required>
                            </div>
                        </div>

                        {{-- <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Jenis</label>
                            <div class="col-sm-12 col-md-4">
                                <select name="jenis_id" class="form-control selectric" required>
                                    <option value="">Pilih Jenis</option>
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item->id }}">{{ $item->jenis }}</option>
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
                                        <option value="{{ $year->id }}" data-tahun="{{ $year->tahun }}">
                                            {{ $year->tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama OPD</label>
                            <div class="col-sm-12 col-md-4">
                                <select name="kode_opd" id="kode_opd" class="form-control select2" required>
                                    <option value="">Pilih Nama OPD</option>
                                    @foreach ($urusan_opd as $opd)
                                        <option value="{{ $opd['kode_opd'] }}">{{ $opd['nama_opd'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="nama_opd" id="nama_opd" class="form-control" readonly>

                        <div id="bidang-urusan-container">
                            <!-- Bidang Urusan 1 -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang Urusan 1</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" name="bidang_urusan_1" id="bidang_urusan_1" class="form-control"
                                        readonly>
                                </div>
                            </div>
                            <!-- Bidang Urusan 2 (disembunyikan secara default) -->
                            <div class="form-group row mb-4" id="bidang-urusan-2" style="display:none;">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang Urusan 2</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" name="bidang_urusan_2" id="bidang_urusan_2" class="form-control"
                                        readonly>
                                </div>
                            </div>
                            <!-- Bidang Urusan 3 (disembunyikan secara default) -->
                            <div class="form-group row mb-4" id="bidang-urusan-3" style="display:none;">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang Urusan 3</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" name="bidang_urusan_3" id="bidang_urusan_3" class="form-control"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Container for Tugas dan Fungsi -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Tugas dan Fungsi Jabatan</label>
                            <div class="col-sm-12 col-md-10">
                                <table class="table table-bordered" id="jabatan-table">
                                    <thead>
                                        <tr>
                                            <th>Jabatan</th>
                                            <th>Tugas</th>
                                            <th>Fungsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Container for Sumber Daya Manusia -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Sumber Daya Manusia</label>
                            <div class="col-sm-12 col-md-10">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="sdm-table">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">No.</th>
                                                <th rowspan="2">Jabatan</th>
                                                <th colspan="4">Status Kepegawaian</th>
                                                <th colspan="6">Pendidikan Terakhir</th>
                                            </tr>
                                            <tr>
                                                <th>PNS</th>
                                                <th>PPPK</th>
                                                <th>Kontrak</th>
                                                <th>Upah</th>
                                                <th>SD/SMP</th>
                                                <th>SMA</th>
                                                <th>D1/D3</th>
                                                <th>D4/S1</th>
                                                <th>S2/S3</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Container for Asets -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Asets</label>
                            <div class="col-sm-12 col-md-10">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="asets-table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Asset Pendukung</th>
                                                <th>Jumlah</th>
                                                <th colspan="3">Kondisi Asset</th>
                                                <th>Perolehan Asset</th>
                                                <th>Keterangan</th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>Baik</th>
                                                <th>Cukup</th>
                                                <th>Kurang</th>
                                                <th>Tahun</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" name="asets_data" id="asets_data">
                        <input type="hidden" name="sdm_data" id="sdm_data">

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Uraian Asets</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian_asets" class="summernote"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Uraian Paragraf Akhir (opsional)</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian" class="summernote"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-success btn-lg mx-2">Submit</button>
                                <a href="{{ route('layouts.admin.bab2.index') }}"
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

            // Event handler for when the value of select2 changes
            $('.select2').on('change', function() {
                const kodeOpd = $(this).val();
                const namaOpdInput = $('#nama_opd');
                const bidangUrusan1Input = $('#bidang_urusan_1');
                const bidangUrusan2Input = $('#bidang_urusan_2');
                const bidangUrusan3Input = $('#bidang_urusan_3');

                if (kodeOpd) {
                    // Call your API to fetch nama OPD and bidang urusan based on selected kode OPD
                    fetch(`/api/urusan_opd/${kodeOpd}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log('API Response:', data); // Debug: log API response
                            if (data.error) {
                                console.error('API Error:', data.error);
                                namaOpdInput.val(''); // Clear nama OPD input
                                bidangUrusan1Input.val('');
                                bidangUrusan2Input.val('');
                                bidangUrusan3Input.val('');
                                $('#bidang-urusan-2').hide();
                                $('#bidang-urusan-3').hide();
                            } else {
                                // Set the input values based on the API response
                                namaOpdInput.val(data.nama_opd || ''); // Set nama OPD
                                let bidangUrusan = data.bidang_urusan.split('\n');
                                bidangUrusan1Input.val(bidangUrusan[0] || '');
                                $('#bidang-urusan-2').toggle(bidangUrusan.length > 1);
                                $('#bidang-urusan-3').toggle(bidangUrusan.length > 2);

                                if (bidangUrusan.length > 1) {
                                    bidangUrusan2Input.val(bidangUrusan[1] || '');
                                    $('#bidang-urusan-2').show();
                                } else {
                                    bidangUrusan2Input.val('');
                                    $('#bidang-urusan-2').hide();
                                }
                                if (bidangUrusan.length > 2) {
                                    bidangUrusan3Input.val(bidangUrusan[2] || '');
                                    $('#bidang-urusan-3').show();
                                } else {
                                    $('#bidang-urusan-3').hide();
                                }
                            }
                        })
                        .catch(error => {
                            console.error('Fetch Error:', error);
                            namaOpdInput.val('');
                            // bidangUrusanInput.val('');
                            bidangUrusan1Input.val('');
                            bidangUrusan2Input.val('');
                            $('#bidang-urusan-2').hide();
                            $('#bidang-urusan-3').hide();
                        });
                } else {
                    // Clear fields if no kode_opd selected
                    namaOpdInput.val('');
                    // bidangUrusanInput.val('');
                    bidangUrusan1Input.val('');
                    bidangUrusan2Input.val('');
                    $('#bidang-urusan-2').hide();
                    $('#bidang-urusan-3').hide();
                }
            });

            $('#tahun_id, #kode_opd').on('change', function() {
                const kodeOpd = $('#kode_opd').val();
                const tahun = $('#tahun_id').find(':selected').data('tahun');

                const tahunAkhir = tahun ? tahun.split('-').pop().trim() : '';

                const sdmTableBody = $('#sdm-table tbody');
                const asetsTableBody = $('#asets-table tbody');
                const jabatanTableBody = $('#jabatan-table tbody');

                sdmTableBody.empty();
                asetsTableBody.empty();
                jabatanTableBody.empty();

                if (kodeOpd && tahunAkhir) {
                    // Fetch Tugas dan Fungsi Jabatan
                    fetch(`/api/sumber-daya-manusia/${tahunAkhir}/${kodeOpd}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log('API Response:', data); // Debug: log API response
                            if (data && Array.isArray(data) && data.length > 0) {
                                data.forEach(item => {
                                    let row = `<tr>
                                    <td>${item.nama_jabatan || 'N/A'}</td>
                                    <td><textarea name="tugas_jabatan[]"></textarea></td>
                                    <td><textarea name="fungsi_jabatan[]"></textarea></td>
                                    <input type="hidden" name="nama_jabatan[]" value="${item.nama_jabatan || ''}"
                                </tr>`;
                                    jabatanTableBody.append(row);
                                });
                            } else {
                                jabatanTableBody.append(
                                    '<tr><td colspan="3">Tidak ada data jabatan.</td></tr>'
                                );
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching jabatan:', error);
                            jabatanTableBody.append(
                                '<tr><td colspan="3">Error fetching data.</td></tr>');
                        });

                    fetch(`/api/sumber-daya-manusia/${tahunAkhir}/${kodeOpd}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log('API Response:', data);
                            if (data && Array.isArray(data) && data.length > 0) {
                                let sdmData = [];

                                data.forEach((item, index) => {
                                    let row = `<tr>
                                    <td>${index + 1}</td>
                                    <td>${item.nama_jabatan || 'N/A'}</td>
                                    <td>${item.status_jumlah_kepegawaian ? item.status_jumlah_kepegawaian['PNS'] || 0 : 0}</td>
                                    <td>${item.status_jumlah_kepegawaian ? item.status_jumlah_kepegawaian['PPPK'] || 0 : 0}</td>
                                    <td>${item.status_jumlah_kepegawaian ? item.status_jumlah_kepegawaian['Kontrak'] || 0 : 0}</td>
                                    <td>${item.status_jumlah_kepegawaian ? item.status_jumlah_kepegawaian['Upah'] || 0 : 0}</td>
                                    <td>${item.pendidikan_terakhir ? item.pendidikan_terakhir['SD/SMP'] || 0 : 0}</td>
                                    <td>${item.pendidikan_terakhir ? item.pendidikan_terakhir['SMA'] || 0 : 0}</td>
                                    <td>${item.pendidikan_terakhir ? item.pendidikan_terakhir['D1/D3'] || 0 : 0}</td>
                                    <td>${item.pendidikan_terakhir ? item.pendidikan_terakhir['D4/S1'] || 0 : 0}</td>
                                    <td>${item.pendidikan_terakhir ? item.pendidikan_terakhir['S2/S3'] || 0 : 0}</td>
                                </tr>`;
                                    sdmTableBody.append(row);
                                    sdmData.push({
                                        nama_jabatan: item.nama_jabatan,
                                        status_jumlah_kepegawaian: item
                                            .status_jumlah_kepegawaian,
                                        pendidikan_terakhir: item.pendidikan_terakhir,
                                    });
                                });
                                document.getElementById('sdm_data').value = JSON.stringify(sdmData);
                            } else {
                                sdmTableBody.append(
                                    '<tr><td colspan="3">Tidak ada data sumber daya manusia.</td></tr>'

                                );
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching Sumber Daya Manusia:', error);
                            sdmTableBody.append('<tr><td colspan="3">Error fetching data.</td></tr>');
                        });

                    // Fetch Asets
                    fetch(`/api/asets/${tahunAkhir}/${kodeOpd}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data && Array.isArray(data) && data.length > 0) {
                                let asetData = [];

                                data.forEach((item, index) => {
                                    let row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.aset || 'N/A'}</td>
                        <td>${item.jumlah_aset || 0} ${item.satuan_aset || ''}</td>
                        <td>${item.kondisi ? item.kondisi.Baik || 0 : 0}</td>
                        <td>${item.kondisi ? item.kondisi.Cukup || 0 : 0}</td>
                        <td>${item.kondisi ? item.kondisi.Kurang || 0 : 0}</td>
                        <td>${item.tahun_perolehan_aset.join(', ') || 'N/A'}</td>
                        <td>${item.keterangan || '-'}</td>
                    </tr>
                `;
                                    asetsTableBody.append(row);

                                    // Add the item data to the asetData array
                                    asetData.push({
                                        aset: item.aset,
                                        jumlah_aset: item.jumlah_aset,
                                        satuan_aset: item.satuan_aset,
                                        kondisi: item.kondisi,
                                        tahun_perolehan_aset: item.tahun_perolehan_aset,
                                        keterangan: item.keterangan
                                    });
                                });

                                // Convert asetData array to JSON format and add it to a hidden input field
                                document.getElementById('asets_data').value = JSON.stringify(asetData);
                            } else {
                                asetsTableBody.append(
                                    '<tr><td colspan="8">Tidak ada data aset.</td></tr>');
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching Asets:', error);
                            asetsTableBody.append('<tr><td colspan="8">Error fetching data.</td></tr>');
                        });
                } else {
                    sdmTableBody.append('<tr><td colspan="3">Silakan pilih Nama OPD dan Tahun.</td></tr>');
                    asetsTableBody.append(
                        '<tr><td colspan="8">Silakan pilih Nama OPD dan Tahun.</td></tr>');
                    jabatanTableBody.append(
                        '<tr><td colspan="8">Silakan pilih Nama OPD dan Tahun.</td></tr>');
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
