@extends('layouts.opd.main')

@section('title', 'Edit BAB 1')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit BAB 1</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('layouts.opd.bab1.index') }}">
                        <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back </button>
                    </a>
                    <form action="{{ route('opd.bab1.update', $bab1->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Form Fields -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama Bab</label>
                            <div class="col-sm-12 col-md-4">
                                <input type="text" name="nama_bab" class="form-control"
                                    value="{{ old('nama_bab', $bab1->nama_bab) }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Jenis</label>
                            <div class="col-sm-12 col-md-4">
                                <select name="jenis_id" class="form-control selectric" required>
                                    <option value="">Pilih Jenis</option>
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $bab1->jenis_id == $item->id ? 'selected' : '' }}>{{ $item->jenis }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Tahun</label>
                            <div class="col-sm-12 col-md-4">
                                <select name="tahun_id" id="tahun_id" class="form-control selectric" required>
                                    <option value="">Pilih Tahun</option>
                                    @foreach ($tahun as $year)
                                        <option value="{{ $year->id }}" data-tahun="{{ $year->tahun }}"
                                            {{ $bab1->tahun_id == $year->id ? 'selected' : '' }}>{{ $year->tahun }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama OPD</label>
                            <div class="col-sm-12 col-md-4">
                                <input type="hidden" name="kode_opd" id="kode_opd"
                                    value="{{ old('kode_opd', $bab1->kode_opd) }}" class="form-control" required>
                                <input type="text" name="nama_opd" id="nama_opd"
                                    value="{{ old('nama_opd', $bab1->nama_opd) }}" class="form-control" readonly>
                            </div>
                        </div>
                        {{-- 
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama OPD</label>
                            <div class="col-sm-12 col-md-4"> --}}
                        {{-- <input type="hidden" name="nama_opd" id="nama_opd" class="form-control"
                            value="{{ old('nama_opd', $bab1->nama_opd) }}" readonly> --}}
                        {{-- </div>
                        </div> --}}

                        {{-- <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang Urusan</label>
                        <div class="col-sm-12 col-md-4">
                            <input type="text" name="bidang_urusan" id="bidang_urusan" class="form-control" value="{{ old('bidang_urusan', $bab1->bidang_urusan) }}" readonly>
                        </div>
                    </div> --}}

                        <div id="bidang-urusan-container">
                            <!-- Bidang Urusan 1 -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang Urusan 1</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" name="bidang_urusan_1" id="bidang_urusan_1" class="form-control"
                                        value="{{ old('bidang_urusan_1', explode("\n", $bab1->bidang_urusan)[0] ?? '') }}"
                                        readonly>
                                </div>
                            </div>
                            <!-- Bidang Urusan 2 -->
                            <div class="form-group row mb-4" id="bidang-urusan-2"
                                style="{{ substr_count($bab1->bidang_urusan, "\n") >= 1 ?: 'display: none;' }}">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang Urusan 2</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" name="bidang_urusan_2" id="bidang_urusan_2" class="form-control"
                                        value="{{ old('bidang_urusan_2', explode("\n", $bab1->bidang_urusan)[1] ?? '') }}"
                                        readonly>
                                </div>
                            </div>
                            <!-- Bidang Urusan 3 -->
                            <div class="form-group row mb-4" id="bidang-urusan-3"
                                style="{{ substr_count($bab1->bidang_urusan, "\n") >= 2 ?: 'display: none;' }}">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang Urusan 3</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" name="bidang_urusan_3" id="bidang_urusan_3" class="form-control"
                                        value="{{ old('bidang_urusan_3', explode("\n", $bab1->bidang_urusan)[2] ?? '') }}"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <div id="uraian-bidang">
                            <!-- Bidang1 Uraian -->
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang 1</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea name="bidang1" class="summernote">{{ old('bidang1', $bab1->bidang1) }}</textarea>
                                </div>
                            </div>
                            <!-- Bidang2 Uraian -->
                            <div class="form-group row mb-4" id="uraian-bidang2"
                                style="{{ substr_count($bab1->bidang_urusan, "\n") >= 1 ?: 'display: none;' }}">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang 2</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea name="bidang2" class="summernote">{{ old('bidang2', $bab1->bidang2) }}</textarea>
                                </div>
                            </div>
                            <!-- Bidang3 Uraian -->
                            <div class="form-group row mb-4" id="uraian-bidang3"
                                style="{{ substr_count($bab1->bidang_urusan, "\n") >= 2 ?: 'display: none;' }}">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang 3</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea name="bidang3" class="summernote">{{ old('bidang3', $bab1->bidang3) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Dasar Hukum</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="dasar_hukum" id="dasar_hukum" class="summernote">{{ old('dasar_hukum', $bab1->dasar_hukum) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Uraian</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian" id="uraian" class="summernote">{{ old('uraian', $bab1->uraian) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-success btn-lg mx-2">Update</button>
                                <a href="{{ route('layouts.opd.bab1.index') }}"
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


            const kodeOpd = $('#kode_opd').val();
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


            $('#tahun_id, #kode_opd').on('change', function() {
                const kodeOpd = $('#kode_opd').val();
                const tahun = $('#tahun_id').find(':selected').data('tahun');
                const dasarHukumTextarea = $('#dasar_hukum');

                if (kodeOpd && tahun) {
                    fetch(
                            `https://kak.madiunkota.go.id/api/substansi_renstra/dasar_hukums?tahun=${tahun}&kode_opd=${kodeOpd}`
                        )
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('404 - Data not found');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.dasar_hukums) {
                                let dasarHukumArray = [];

                                data.dasar_hukums.forEach(item => {
                                    dasarHukumArray.push({
                                        judul: item.judul,
                                        peraturan: item.peraturan.replace(
                                            /<br>\s*-\s*<br>/, '<br>')
                                    });
                                });

                                let dasarHukumContent = '';

                                dasarHukumArray.forEach((item, index) => {
                                    dasarHukumContent += `
                                    <div>
                                        <strong>${item.judul}</strong><br>
                                        ${item.peraturan}
                                    </div>`;
                                });

                                dasarHukumTextarea.summernote('code', dasarHukumContent);
                            } else {
                                dasarHukumTextarea.summernote('code', 'No data found');
                            }
                        })
                        .catch(error => {
                            console.error('Fetch Error:', error);
                            dasarHukumTextarea.summernote('code', 'Error fetching data');
                        });
                } else {
                    dasarHukumTextarea.summernote('code', '');
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

        document.addEventListener('DOMContentLoaded', function() {
            var userKodeOpd = @json($userKodeOpd);
            var urusanOpd = @json($urusan_opd);
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
