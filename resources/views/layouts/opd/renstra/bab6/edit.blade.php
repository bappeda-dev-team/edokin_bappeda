@extends('layouts.opd.main')

@section('title', 'Edit BAB 6')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit BAB 6</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('layouts.opd.bab6.index') }}">
                    <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back </button>
                </a>
                <form action="{{ route('opd.bab6.store') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Nama Bab Field -->
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama Bab</label>
                        <div class="col-sm-12 col-md-4">
                            <input type="text" name="nama_bab" class="form-control" value="{{ old('nama_bab', $bab6->nama_bab) }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Jenis</label>
                        <div class="col-sm-12 col-md-4">
                            <select name="jenis_id" class="form-control selectric" required>
                                <option value="">Pilih Jenis</option>
                                @foreach($jenis as $item)
                                    <option value="{{ $item->id }}" {{ $bab6->jenis_id == $item->id ? 'selected' : '' }}>{{ $item->jenis }}</option>
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
                                    <option value="{{ $year->id }}" {{ $bab6->tahun_id == $year->id ? 'selected' : '' }}>{{ $year->tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Kode OPD</label>
                        <div class="col-sm-12 col-md-4">
                            <input type="hidden" name="kode_opd" id="kode_opd"
                            value="{{ old('kode_opd', $bab6->kode_opd) }}" class="form-control" required>
                        <input type="text" name="nama_opd" id="nama_opd"
                            value="{{ old('nama_opd', $bab6->nama_opd) }}" class="form-control" disabled>
                        </div>
                    </div>

                    <!-- Nama OPD Field -->
                    {{-- <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama OPD</label>
                        <div class="col-sm-12 col-md-4"> --}}
                            <input type="hidden" id="nama_opd" name="nama_opd" class="form-control" readonly>
                        {{-- </div>
                    </div> --}}

                    <!-- Tujuan OPD Field -->
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Tujuan OPD</label>
                        <div class="col-sm-12 col-md-4">
                            <textarea id="tujuan_opd" name="tujuan_opd" class="form-control" rows="4" readonly></textarea>
                        </div>
                    </div>

                    <!-- Sasaran OPD Field -->
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Sasaran OPD</label>
                        <div class="col-sm-12 col-md-4">
                            <textarea id="sasaran_opd" name="sasaran_opd" class="form-control" rows="4" readonly></textarea>
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
    // $(document).ready(function() {
    //     // Initialize Select2 on the Kode OPD dropdown
    //     $('#kode_opd').select2({
    //         placeholder: 'Pilih Kode OPD',
    //         allowClear: true,
    //         width: '100%'
    //     }).on('select2:select', function(e) {
    //         // Fetch the selected OPD code and call the fetchOpdDetails function
    //         const kodeOpd = e.params.data.id;
    //         if (kodeOpd) {
    //             fetchOpdDetails(kodeOpd);
    //         } else {
    //             // Clear fields if no OPD is selected
    //             document.getElementById('nama_opd').value = '';
    //             document.getElementById('tujuan_opd').value = '';
    //             document.getElementById('sasaran_opd').value = '';
    //         }
    //     });

    //     // Function to fetch OPD details
    //     async function fetchOpdDetails(kodeOpd) {
    //         try {
    //             console.log(`Fetching details for OPD code: ${kodeOpd}`);
    //             const response = await fetch(`/api/opd-details/${encodeURIComponent(kodeOpd)}`);
    //             if (!response.ok) {
    //                 const errorText = await response.text();
    //                 console.error(`Network response was not ok. Status: ${response.status}, Response: ${errorText}`);
    //                 throw new Error(`Network response was not ok. Status: ${response.status}, Response: ${errorText}`);
    //             }
    //             const data = await response.json();
    //             console.log('Fetched data:', data);
    //             if (data) {
    //                 document.getElementById('nama_opd').value = data.nama_opd || '';
    //                 document.getElementById('tujuan_opd').value = data.tujuan_opd || '';
    //                 document.getElementById('sasaran_opd').value = data.sasaran_opd || '';
    //             } else {
    //                 console.error('Error fetching OPD details: No data received.');
    //             }
    //         } catch (error) {
    //             console.error('Failed to fetch OPD details:', error);
    //         }
    //     }
    // });
    
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
@endsection