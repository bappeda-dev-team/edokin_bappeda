@extends('layouts.admin.main')

@section('title', 'Dashboard E-DOKIN')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>BAB 1</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('layouts.admin.bab1.index') }}">
                    <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back </button>
                </a>
                <form action="{{ route('bab1.store') }}" method="POST">
                    @csrf
                    <!-- Form Fields -->
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
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Kode OPD</label>
                        <div class="col-sm-12 col-md-4">
                            <select name="kode_opd" id="kode_opd" class="form-control selectric" required>
                                <option value="">Pilih Kode OPD</option>
                                @foreach($urusan_opd as $opd)
                                    <option value="{{ $opd['kode_opd'] }}">{{ $opd['kode_opd'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama OPD</label>
                        <div class="col-sm-12 col-md-4">
                            <input type="text" name="nama_opd" id="nama_opd" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang Urusan</label>
                        <div class="col-sm-12 col-md-4">
                            <input type="text" name="bidang_urusan" id="bidang_urusan" class="form-control" readonly>
                        </div>
                    </div>

                    {{-- <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang Urusan</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="bidang_urusan" id="bidang_urusan" class="summernote" readonly></textarea>
                        </div>
                    </div> --}}


                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang 1</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="bidang1" class="summernote"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang 2</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="bidang2" class="summernote"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Dasar Hukum</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="dasar_hukum" class="summernote"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-success btn-lg mx-2">Submit</button>
                            <a href="{{ route('layouts.admin.bab1.index') }}" class="btn btn-danger btn-lg mx-2">Cancel</a>
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
document.addEventListener('DOMContentLoaded', function () {
    const kodeOpdSelect = document.querySelector('select[name="kode_opd"]');
    const namaOpdInput = document.getElementById('nama_opd');
    const bidangUrusanInput = document.getElementById('bidang_urusan');
    if (kodeOpdSelect) {
        kodeOpdSelect.addEventListener('change', function () {
            const kodeOpd = this.value;
            if (kodeOpd) {
                fetch(`/api/urusan_opd/${kodeOpd}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('API Response:', data); // Debug: log API response
                        if (data.error) {
                            console.error('API Error:', data.error);
                            namaOpdInput.value = '';
                            bidangUrusanInput.value = '';
                        } else {
                            namaOpdInput.value = data.nama_opd || '';
                            // Display bidang_urusan
                            bidangUrusanInput.value = data.bidang_urusan || '';
                        }
                    })
                    .catch(error => {
                        console.error('Fetch Error:', error);
                        namaOpdInput.value = '';
                        bidangUrusanInput.value = '';
                    });
            } else {
                namaOpdInput.value = '';
                bidangUrusanInput.value = '';
            }
        });
    }
    // Initialize Summernote after DOM is loaded
    document.addEventListener('DOMContentLoaded', function () {
        const summernoteElements = document.querySelectorAll('.summernote');
        summernoteElements.forEach(el => {
            $(el).summernote({
                height: 300,   // set the height of the editor
                minHeight: null, // set minimum height of the editor
                maxHeight: null, // set maximum height of the editor
                focus: true     // set focus to editable area after initializing summernote
            });
        });
    });
});
</script>
@endsection