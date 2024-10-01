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
                            <select name="kode_opd" id="kode_opd" class="form-control select2" required>
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

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Uraian</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="uraian" class="summernote"></textarea>
                        </div>
                    </div>

                    {{-- <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang Urusan</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="bidang_urusan" id="bidang_urusan" class="summernote" readonly></textarea>
                        </div>
                    </div> --}}


                    {{-- <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Bidang 1</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="bidang1" class="summernote"></textarea>
                        </div>
                    </div> --}}

                    {{-- <div class="form-group row mb-4">
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
                    </div> --}}

                    <div class="form-group row mb-4">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-success btn-lg mx-2">Submit</button>
                            <a href="{{ route('layouts.admin.bab2.index') }}" class="btn btn-danger btn-lg mx-2">Cancel</a>
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
        placeholder: 'Pilih Kode OPD',
        allowClear: true,
        width: '100%'
    });

    // Event handler for when the value of select2 changes
    $('.select2').on('change', function () {
        const kodeOpd = $(this).val();
        const namaOpdInput = $('#nama_opd');
        const bidangUrusanInput = $('#bidang_urusan');
        
        if (kodeOpd) {
            // Call your API to fetch nama OPD and bidang urusan based on selected kode OPD
            fetch(`/api/urusan_opd/${kodeOpd}`)
                .then(response => response.json())
                .then(data => {
                    console.log('API Response:', data); // Debug: log API response
                    if (data.error) {
                        console.error('API Error:', data.error);
                        namaOpdInput.val(''); // Clear nama OPD input
                        bidangUrusanInput.val(''); // Clear bidang urusan input
                    } else {
                        // Set the input values based on the API response
                        namaOpdInput.val(data.nama_opd || ''); // Set nama OPD
                        bidangUrusanInput.val(data.bidang_urusan || ''); // Set bidang urusan
                    }
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                    namaOpdInput.val(''); // Clear nama OPD input in case of error
                    bidangUrusanInput.val(''); // Clear bidang urusan input in case of error
                });
        } else {
            // Clear both inputs if no kode OPD is selected
            namaOpdInput.val('');
            bidangUrusanInput.val('');
        }
    });

    // Initialize Summernote for all elements with the class 'summernote'
    $('.summernote').summernote({
        height: 300,   // set the height of the editor
        minHeight: null, // set minimum height of the editor
        maxHeight: null, // set maximum height of the editor
        focus: true     // set focus to editable area after initializing summernote
    });
});

</script>
@endsection