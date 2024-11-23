@extends('layouts.admin.main')

@section('title', 'Edit BAB 2')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit BAB 2</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('layouts.admin.bab2.index') }}">
                        <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back </button>
                    </a>
                    <form action="{{ route('bab2.update', $bab2->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Form Fields -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama Bab</label>
                            <div class="col-sm-12 col-md-4">
                                <input type="text" name="nama_bab" class="form-control"
                                    value="{{ old('nama_bab', $bab2->nama_bab) }}" required>
                            </div>
                        </div>

                        {{-- <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Jenis</label>
                            <div class="col-sm-12 col-md-4">
                                <select name="jenis_id" class="form-control selectric" required>
                                    <option value="">Pilih Jenis</option>
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $bab2->jenis_id == $item->id ? 'selected' : '' }}>{{ $item->jenis }}
                                        </option>
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
                                            {{ $bab2->tahun_id == $year->id ? 'selected' : '' }}>{{ $year->tahun }}
                                        </option>
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
                                        <option value="{{ $opd['kode_opd'] }}"
                                            {{ $bab2->kode_opd == $opd['kode_opd'] ? 'selected' : '' }}>
                                            {{ $opd['nama_opd'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama OPD</label>
                            <div class="col-sm-12 col-md-4"> --}}
                        <input type="hidden" name="nama_opd" id="nama_opd" class="form-control"
                            value="{{ old('nama_opd', $bab2->nama_opd) }}" readonly>
                        {{-- </div>
                        </div> --}}

                        <div id="bidang-urusan-container">
                            <!-- Bidang Urusan 1 -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang Urusan 1</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" name="bidang_urusan_1" id="bidang_urusan_1" class="form-control"
                                        value="{{ old('bidang_urusan_1', explode("\n", $bab2->bidang_urusan)[0] ?? '') }}"
                                        readonly>
                                </div>
                            </div>
                            <!-- Bidang Urusan 2 -->
                            <div class="form-group row mb-4" id="bidang-urusan-2"
                                style="{{ substr_count($bab2->bidang_urusan, "\n") >= 1 ?: 'display: none;' }}">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang Urusan 2</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" name="bidang_urusan_2" id="bidang_urusan_2" class="form-control"
                                        value="{{ old('bidang_urusan_2', explode("\n", $bab2->bidang_urusan)[1] ?? '') }}"
                                        readonly>
                                </div>
                            </div>
                            <!-- Bidang Urusan 3 -->
                            <div class="form-group row mb-4" id="bidang-urusan-3"
                                style="{{ substr_count($bab2->bidang_urusan, "\n") >= 2 ?: 'display: none;' }}">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang Urusan 3</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" name="bidang_urusan_3" id="bidang_urusan_3" class="form-control"
                                        value="{{ old('bidang_urusan_3', explode("\n", $bab2->bidang_urusan)[2] ?? '') }}"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Container for Tugas dan Fungsi -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Tugas dan Fungsi
                                Jabatan</label>
                            <div class="col-sm-12 col-md-10">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="jabatan-table">
                                        <thead>
                                            <tr>
                                                <th>Jabatan</th>
                                                <th>Tugas</th>
                                                <th>Fungsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (empty($tugas_fungsi) || count($tugas_fungsi) === 0)
                                                <tr>
                                                    <td colspan="3" class="text-center">Tidak ada data jabatan tersedia.
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($tugas_fungsi as $item)
                                                    <tr>
                                                        <td>
                                                            {{ ucwords(strtolower($item['nama_jabatan'])) }}
                                                        </td>
                                                        <input type="hidden" name="nama_jabatan[]"
                                                            value="{{ ucwords(strtolower($item['nama_jabatan'])) }}">
                                                        <td>
                                                            <textarea name="tugas_jabatan[]" id="">{!! strip_tags($item['tugas_jabatan'] ?? 'N/A', '<br><b><u><i><strong><em>') !!}</textarea>
                                                        </td>
                                                        <td>
                                                            <textarea name="fungsi_jabatan[]" id="">{!! strip_tags($item['fungsi_jabatan'] ?? 'N/A', '<br><b><u><i><strong><em>') !!}</textarea>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
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
                                            @if (empty($sumber_daya_manusia) || count($sumber_daya_manusia) === 0)
                                                <tr>
                                                    <td colspan="11" class="text-center">Tidak ada sumber daya manusia
                                                        tersedia</td>
                                                </tr>
                                            @else
                                                @foreach ($sumber_daya_manusia as $index => $jabatan)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ ucwords(strtolower($jabatan['nama_jabatan'])) }}</td>
                                                        <td>{{ $jabatan['status_jumlah_kepegawaian']['PNS'] ?? 0 }}</td>
                                                        <td>{{ $jabatan['status_jumlah_kepegawaian']['PPPK'] ?? 0 }}</td>
                                                        <td>{{ $jabatan['status_jumlah_kepegawaian']['Kontrak'] ?? 0 }}
                                                        </td>
                                                        <td>{{ $jabatan['status_jumlah_kepegawaian']['Upah'] ?? 0 }}</td>
                                                        <td>{{ $jabatan['pendidikan_terakhir']['SD/SMP'] ?? 0 }}</td>
                                                        <td>{{ $jabatan['pendidikan_terakhir']['SMA'] ?? 0 }}</td>
                                                        <td>{{ $jabatan['pendidikan_terakhir']['D1/D3'] ?? 0 }}</td>
                                                        <td>{{ $jabatan['pendidikan_terakhir']['D4/S1'] ?? 0 }}</td>
                                                        <td>{{ $jabatan['pendidikan_terakhir']['S2/S3'] ?? 0 }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
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
                                            @if (empty($asets) || count($asets) === 0)
                                                <tr>
                                                    <td colspan="8" class="text-center">Tidak ada aset tersedia</td>
                                                </tr>
                                            @else
                                                @foreach ($asets as $index => $aset)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ ucwords(strtolower($aset['aset'])) }}</td>
                                                        <td>{{ $aset['jumlah_aset'] }} {{ $aset['satuan_aset'] }}</td>
                                                        <td>{{ $aset['kondisi']['Baik'] ?? 0 }}</td>
                                                        <td>{{ $aset['kondisi']['Cukup'] ?? 0 }}</td>
                                                        <td>{{ $aset['kondisi']['Kurang'] ?? 0 }}</td>
                                                        <td>{{ implode(', ', $aset['tahun_perolehan_aset'] ?? []) }}</td>
                                                        <td>{{ $aset['keterangan'] }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="asets_data" id="asets_data"
                            value="{{ old('asets_data', $bab2->asets_data) }}">
                        <input type="hidden" name="sdm_data" id="sdm_data"
                            value="{{ old('sdm_data', $bab2->sdm_data) }}">

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Uraian Asets</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian_asets" class="summernote">{{ old('uraian', $bab2->uraian_asets) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Uraian pada Paragraf
                                Terakhir</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian" class="summernote">{{ old('uraian', $bab2->uraian) }}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Uraian Mitra PD</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian_mitra_pd" class="summernote">{{ old('uraian_mitra_pd', $bab2->uraian_mitra_pd) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Uraian Dukungan
                                Instansi/Perusahaan</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian_dukungan_instansi" class="summernote">{{ old('uraian_dukungan_instansi', $bab2->uraian_dukungan_instansi) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Uraian Kerjasama dengan
                                Pemerintah Daerah Lain</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian_kerjasama_dengan_pemda_lain" class="summernote">{{ old('uraian_kerjasama_dengan_pemda_lain', $bab2->uraian_kerjasama_dengan_pemda_lain) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-success btn-lg mx-2">Update</button>
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

            // Event listener for Select2 change event
            $('.select2').on('change', function() {
                const kodeOpd = $(this).val();
                const namaOpdInput = $('#nama_opd');
                // const bidangUrusanInput = $('#bidang_urusan');
                const bidangUrusan1Input = $('#bidang_urusan_1');
                const bidangUrusan2Input = $('#bidang_urusan_2');
                const bidangUrusan3Input = $('#bidang_urusan_3');

                if (kodeOpd) {
                    // Fetch data from API using the selected kode_opd
                    fetch(`/api/urusan_opd/${kodeOpd}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                console.error('API Error:', data.error);
                                namaOpdInput.val('');
                                // bidangUrusanInput.val('');
                                bidangUrusan1Input.val('');
                                bidangUrusan2Input.val('');
                                bidangUrusan3Input.val('');
                                $('#bidang-urusan-2').hide();
                                $('#bidang-urusan-3').hide();
                            } else {
                                // Populate nama_opd and bidang_urusan
                                namaOpdInput.val(data.nama_opd || '');
                                // bidangUrusanInput.val(data.bidang_urusan || '');

                                let bidangUrusan = data.bidang_urusan.split('\n');
                                bidangUrusan1Input.val(bidangUrusan[0] || '');
                                $('#bidang-urusan-2').toggle(bidangUrusan.length > 1);
                                $('#bidang-urusan-3').toggle(bidangUrusan.length > 2);

                                if (bidangUrusan.length > 1) {
                                    bidangUrusan2Input.val(bidangUrusan[1] || '');
                                    $('#bidang-urusan-2').show();
                                    $('#uraian-bidang2').show();
                                } else {
                                    bidangUrusan2Input.val('');
                                    $('#bidang-urusan-2').hide();
                                    $('#uraian-bidang2').hide();
                                }
                                if (bidangUrusan.length > 2) {
                                    bidangUrusan3Input.val(bidangUrusan[2] || '');
                                    $('#bidang-urusan-3').show();
                                    $('#uraian-bidang3').show();
                                } else {
                                    $('#bidang-urusan-3').hide();
                                    $('#uraian-bidang3').hide();
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
                            $('#uraian-bidang2').hide();
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
                    lastKodeOpd = kodeOpd;
                    lastTahun = tahunAkhir;
                }

                const fetchKodeOpd = kodeOpd || lastKodeOpd;
                const fetchTahun = tahunAkhir || lastTahun;

                if (fetchKodeOpd && fetchTahun) {
                    // Fetch Tugas dan Fungsi
                    fetch(`/api/sumber-daya-manusia/${fetchTahun}/${fetchKodeOpd}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log('API Response:', data); // Debug: log API response
                            if (data && Array.isArray(data) && data.length > 0) {
                                data.forEach(item => {
                                    let row = `<tr>
                            <td>${item.nama_jabatan || 'N/A'}</td>
                            <td><textarea name="tugas_jabatan[]"></textarea></td>
                            <td><textarea name="fungsi_jabatan[]"></textarea></td>
                            <input type="hidden" name="nama_jabatan[]" value="${item.nama_jabatan || ''}">
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


                    // Fetch Sumber Daya Manusia
                    fetch(`/api/sumber-daya-manusia/${fetchTahun}/${fetchKodeOpd}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log('API Response:', data); // Debug: log API response
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
                    fetch(`/api/asets/${fetchTahun}/${fetchKodeOpd}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log('API Response:', data); // Debug: log API response
                            if (data && Array.isArray(data) && data.length > 0) {
                                let asetData = [];

                                data.forEach((item, index) => {
                                    let row = `<tr>
                            <td>${index + 1}</td>
                            <td>${item.aset || 'N/A'}</td>
                            <td>${item.jumlah_aset || 0} ${item.satuan_aset || ''}</td>
                            <td>${item.kondisi ? item.kondisi.Baik  || 0 : 0}</td>
                            <td>${item.kondisi ? item.kondisi.Cukup  || 0 : 0}</td>
                            <td>${item.kondisi ? item.kondisi.Kurang  || 0 : 0}</td>
                            <td>${item.tahun_perolehan_aset.join(', ') || 'N/A'}</td>
                            <td>${item.keterangan || '-'}</td>
                        </tr>`;
                                    asetsTableBody.append(row);
                                    asetData.push({
                                        aset: item.aset,
                                        jumlah_aset: item.jumlah_aset,
                                        satuan_aset: item.satuan_aset,
                                        kondisi: item.kondisi,
                                        tahun_perolehan_aset: item.tahun_perolehan_aset,
                                        keterangan: item.keterangan
                                    });
                                });
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
                    sdmTableBody.append(
                    '<tr><td colspan="3">Silakan pilih Nama OPD dan Periode.</td></tr>');
                    asetsTableBody.append(
                        '<tr><td colspan="8">Silakan pilih Nama OPD dan Periode.</td></tr>');
                    jabatanTableBody.append(
                        '<tr><td colspan="8">Silakan pilih Nama OPD dan Periode.</td></tr>');
                }
            });

            // Initialize Summernote
            $('.summernote').summernote({
                height: 300, // Set the height of the editor
                minHeight: null, // Set minimum height of the editor
                maxHeight: null, // Set maximum height of the editor
                focus: true // Set focus to editable area after initializing summernote
            });
        });
    </script>
@endsection
