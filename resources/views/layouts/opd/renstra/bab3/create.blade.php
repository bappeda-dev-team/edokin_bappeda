@extends('layouts.opd.main')

@section('title', 'Dashboard E-DOKIN')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>BAB 3</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('layouts.opd.bab3.index') }}">
                        <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back </button>
                    </a>
                    <form action="{{ route('opd.bab3.store') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama Bab</label>
                            <div class="col-sm-12 col-md-4">
                                <input type="text" name="nama_bab" class="form-control" required>
                            </div>
                        </div>

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
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Lama Periode</label>
                            <div class="col-sm-12 col-md-4">
                                <input type="text" name="lama_periode" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama OPD</label>
                            <div class="col-sm-12 col-md-4">
                                <input type="hidden" name="kode_opd" id="kode_opd" class="form-control" required>
                                <input type="text" name="nama_opd" id="nama_opd" class="form-control" readonly>
                            </div>
                        </div>

                        <!-- Container for Akar Masalah -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Akar Masalah</label>
                            <div class="col-sm-12 col-md-10">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="masalah-table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Masalah Pokok</th>
                                                <th>Masalah</th>
                                                <th>Akar Masalah</th>
                                            </tr>
                                        </thead>
                                        <tbody id="masalah-tbody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="akar_masalah" id="akar_masalah">


                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Gambar Pelayanan Perangkat
                                Daerah</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian1" class="summernote"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Sasaran Jangka Menengah
                                pada Renstra Kementerian/Lembaga</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian2" class="summernote"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Sasaran Jangka Menengah
                                dari Renstra Perangkat Daerah Provinsi</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian3" class="summernote"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Implikasi RTRW bagi
                                Pelayanan Perangkat Daerah</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian4" class="summernote"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Implikasi KLHS bagi
                                Pelayanan Perangkat Daerah</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian5" class="summernote"></textarea>
                            </div>
                        </div>

                        <!-- Container for Isu Strategis -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Permasalahan dan Isu
                                Strategis</label>
                            <div class="col-sm-12 col-md-10">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="isu-strategis-table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Program</th>
                                                <th>Isu Strategis</th>
                                                <th>Permasalahan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="isu_strategis" id="isu_strategis">

                        {{-- <div id="urusan-strategis-container">

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Isu
                                    Strategis 1)</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea name="isu_strategis1" id="isu_strategis1" class="summernote"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4" id="urusan-strategis-2" style="display:none;">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Isu
                                    Strategis 2)</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea name="isu_strategis2" id="isu_strategis2" class="summernote"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4" id="urusan-strategis-3" style="display:none;">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Isu
                                    Strategis 3)</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea name="isu_strategis3" id="isu_strategis3" class="summernote"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4" id="urusan-strategis-4" style="display:none;">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Isu
                                    Strategis 4)</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea name="isu_strategis4" id="isu_strategis4" class="summernote"></textarea>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Uraian Paragraf Akhir
                                (opsional)</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian" class="summernote"></textarea>
                            </div>
                        </div>



                        <div class="form-group row mb-4">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-success btn-lg mx-2">Submit</button>
                                <a href="{{ route('layouts.opd.bab3.index') }}"
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
            // $('.select2').on('change', function() {
            const kodeOpd = $('#kode_opd').val();
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
            // });

            $('#tahun_id, #kode_opd').on('change', function() {
                const kodeOpd = $('#kode_opd').val();
                const tahun = $('#tahun_id').find(':selected').data('tahun');
                const namaOpdInput = $('#nama_opd');
                const isuStrategisInput = $('#isu_strategis');
                const tahunAkhir = tahun ? tahun.split('-').pop().trim() : '';

                if (kodeOpd && tahunAkhir) {
                    fetch(`/api/isu-strategis/${tahunAkhir}/${kodeOpd}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Isu Strategis API Response:', data);

                            const isuStrategisTableBody = $('#isu-strategis-table tbody');
                            isuStrategisTableBody.empty();
                            if (data.error) {
                                console.error('Isu Strategis API Error:', data.error);
                                return;
                            }

                            const isuStrategisItems = data.results || [];
                            let tableRows = '';
                            let isuStrategisData = [];

                            isuStrategisItems.forEach((item, index) => {
                                const permasalahanList = Array.isArray(item.permasalahans) ?
                                    item.permasalahans
                                    .map((permasalahans) => `<li>${permasalahans}</li>`)
                                    .join('') :
                                    `<li>Data tidak tersedia</li>`;

                                tableRows += `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>(${item.kode_program})</br> ${item.program || 'Data tidak tersedia'}</td>
                                    <td>${item.isu_strategis || 'Data tidak tersedia'}</td>
                                    <td>
                                        <ul>${permasalahanList}</ul>
                                    </td>
                                </tr>`;

                                isuStrategisData.push({
                                    kode_program: item.kode_program,
                                    program: item.program,
                                    isu_strategis: item.isu_strategis,
                                    permasalahans: item.permasalahans
                                });
                            });

                            if (tableRows) {
                                isuStrategisTableBody.html(tableRows);
                            } else {
                                tableRows =
                                    '<tr><td colspan="4" class="text-center">Data tidak tersedia</td></tr>';
                                isuStrategisTableBody.html(tableRows);
                            }
                            document.getElementById('isu_strategis').value = JSON.stringify(
                                isuStrategisData);
                        })
                        .catch(error => {
                            console.error('Fetch Error:', error);
                        });

                    // Fetch Permasalahan (Akar Masalah)
                    fetch(
                            `https://kak.madiunkota.go.id/api/substansi_renstra/akar_masalah?tahun=${tahunAkhir}&kode_opd=${kodeOpd}`
                        )
                        .then(response => response.json())
                        .then(data => {
                            console.log('Permasalahan API Response:', data);

                            if (data.error) {
                                console.error('Permasalahan API Error:', data.error);
                            } else {

                                namaOpdInput.val(data.nama_opd || '');

                                const masalahPokoks = data.masalah_pokoks || [];
                                let tableRows = '';
                                let permasalahanData = [];

                                masalahPokoks.forEach((pokok, index) => {
                                    let pokokEntry = {
                                        masalah_pokok: pokok.masalah_pokok ||
                                            'Data tidak tersedia',
                                        masalahs: []
                                    };

                                    const masalahPokokRowspan = pokok.masalahs.reduce((
                                            count, masalah) => count + masalah
                                        .akar_masalahs
                                        .length, 0);

                                    tableRows += `
                                        <tr>
                                            <td rowspan="${masalahPokokRowspan}">${index + 1}</td>
                                            <td rowspan="${masalahPokokRowspan}">${pokok.masalah_pokok || 'Data tidak tersedia'}</td>
                                     
                                        `;

                                    pokok.masalahs.forEach((masalah, masalahIndex) => {
                                        let masalahEntry = {
                                            masalah: masalah.masalah ||
                                                'Data tidak tersedia',
                                            akar_masalahs: []
                                        };

                                        const masalahRowspan = masalah
                                            .akar_masalahs
                                            .length;

                                        if (masalahIndex === 0) {
                                            tableRows +=
                                                `<td rowspan="${masalahRowspan}">${masalah.masalah || ''}</td>`;
                                        } else {
                                            tableRows += `
                                                    <tr>
                                                        <td rowspan="${masalahRowspan}">${masalah.masalah || 'Data tidak tersedia'}</td>
                                                  `;
                                        }

                                        masalah.akar_masalahs.forEach((akar,
                                            akarIndex) => {
                                            if (akarIndex === 0) {
                                                tableRows +=
                                                    `<td>${akar.akar_masalah || 'Data tidak tersedia'}</td></tr>`;
                                            } else {
                                                tableRows += `
                                                            <tr>
                                                                <td>${akar.akar_masalah || 'Data tidak tersedia'}</td>
                                                            </tr>`;
                                            }

                                            masalahEntry.akar_masalahs
                                                .push({
                                                    id_masalah: akar
                                                        .id_masalah,
                                                    akar_masalah: akar
                                                        .akar_masalah ||
                                                        'Data tidak tersedia'
                                                });
                                        });

                                        pokokEntry.masalahs.push(masalahEntry);
                                    });

                                    permasalahanData.push(pokokEntry);
                                });
                                document.getElementById("masalah-tbody").innerHTML = tableRows;
                                document.getElementById("akar_masalah").value = JSON.stringify(
                                    permasalahanData);
                            }
                        })
                        .catch(error => {
                            console.error('Permasalahan Fetch Error:', error);
                        });
                }
            });

            $('.summernote').summernote({
                height: 300,
                minHeight: null,
                maxHeight: null,
                focus: true
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var userKodeOpd = @json($userKodeOpd);
            var urusanOpd = @json($data_opd);
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
@endsection
