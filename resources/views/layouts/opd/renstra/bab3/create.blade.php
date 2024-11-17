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
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama OPD</label>
                            <div class="col-sm-12 col-md-4">
                                <input type="hidden" name="kode_opd" id="kode_opd" class="form-control" required>
                                <input type="text" name="nama_opd" id="nama_opd" class="form-control" readonly>
                            </div>
                        </div>


                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Uraian
                                1)</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian1" class="summernote"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Uraian
                                2)</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian2" class="summernote"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Uraian
                                3)</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian3" class="summernote"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Uraian
                                4)</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian4" class="summernote"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Uraian
                                5)</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="uraian5" class="summernote"></textarea>
                            </div>
                        </div>

                        {{-- <div id="urusan-strategis-container"> --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">3.2 Isu Strategis (Isu
                                Strategis)</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea name="isu_strategis[]" id="isu_strategis" class="summernote" rows="4"></textarea>
                            </div>
                        </div>
                        {{-- </div> --}}

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
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Uraian Paragraf Akhir (opsional)</label>
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

            // $(document).ready(function() {
                $('#isu_strategis').summernote({
                    height: 200,
                });

                $('.select2').on('change', function() {
                    const kodeOpd = $(this).val();
                    const tahun = $('#tahun_id').find(':selected').data('tahun');
                    const namaOpdInput = $('#nama_opd');
                    const isuStrategisInput = $('#isu_strategis');
                    namaOpdInput.val('');
                    isuStrategisInput.summernote('code', '');

                    if (kodeOpd && tahun) {
                        fetch(`/api/isu-strategis/${tahun}/${kodeOpd}`)
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
