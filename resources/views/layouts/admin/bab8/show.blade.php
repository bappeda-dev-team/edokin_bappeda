@extends('layouts.admin.main')

@section('title', 'Detail BAB VIII')

<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
    }
    .section {
        margin: 20px 0;
    }
    .section h1 {
        font-size: 24px;
        margin-bottom: 10px;
        text-align: center;
    }
    .section h2 {
        font-size: 20px;
        margin-bottom: 8px;
        text-align: center;
    }
    .section p {
        margin: 5px 0;
    }
    .list {
        margin: 10px 0;
    }
    .list ul {
        list-style-type: disc;
        margin-left: 20px;
    }
    .list ol {
        margin-left: 20px;
    }
    .list ul ul {
        list-style-type: circle;
    }
    .indent {
        text-indent: 48px;
        margin-left: 20px;
    }
    .indent1 {
        text-indent: 90px;
        margin-left: 20px;
    }
    .indent2 {
        text-indent: 28px;
        margin-left: 20px;   
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    th, td {
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

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail BAB VIII</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <a href="{{ route('layouts.admin.bab8.index') }}">
                    <button class="btn btn-primary mb-3"><i class="fa fa-arrow-left"></i> Back </button>
                </a>
                <a href="{{ route('bab8.exportPdf',$bab8->id) }} "target="_blank">
                    <button class="btn btn-danger mb-3"><i class="fa fa-file-pdf"></i> Export to PDF </button>
                </a>

                <div class="document-content">
                    <h1>BAB VIII</h1>
                    <h1>PENUTUP</h1><br>

                    <p class="indent1">Rencana Strategis Perangkat Daerah pada Perangkat Daerah guna melakukan optimalisasi pelayanan pemerintahan.
                        <span style="color: rgb(11, 242, 11);">{{$nama_opd}}</span> dtelah dilakukan pembahasan dan analisis kebutuhan dan memperhatikan isu-isu penting terkait pelayanan Perangkat Daerah. Forum Renstra Perangkat Daerah juga mengakomodir usulan masyarakat melalui Musyawarah Pembangunan bersama stakeholder, usulan Pokok Pikiran DPRD, usulan Top Down, serta yang menjadi kewenangan Perangkat Daerah.</p> 
                        <p class="indent1">Demikian Rencana Strategis Perangkat Daerah (Renja PD) Perangkat Daerah guna melakukan optimalisasi pelayanan pemerintahan.
                            <span style="color: rgb(11, 242, 11);">{{$nama_opd}}</span>disusun sebagai pedoman dalam Menyusun Rencana Kerja Perangkat Daerah setiap Tahunnya.</p> 
                            <br><br>
                            <div style="text-align: right;">
                                <p>Madiun,.....</p>
                                <p>Kepala <span style="color: rgb(11, 242, 11);">{{$nama_opd}}</span></p><br><br><br><br>
                               <!-- Bagian ini di-center -->
                                <p style="text-align: center; margin-left:85%">
                                    <span style="color: rgb(11, 242, 11);">(nama kepala)</span>
                                </p>
                                <p style="text-align: center;margin-left:85%">
                                    <span style="color: rgb(11, 242, 11);">pangkat</span>
                                </p>
                                <p style="text-align: center;margin-left:85%">
                                    <span style="color: rgb(11, 242, 11);">nip</span>
                                </p>
                            </div>
                            <div class="indent">
                                <span style="color: rgb(250, 5, 5);">{!!$bab8->uraian!!}</span>
                            </div>
                            
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    .document-content {
        margin-top: 20px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #f9f9f9;
    }
    .document-content p {
        font-size: 1rem;
        line-height: 1.6;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .btn-primary {
        margin-bottom: 20px;
    }
</style>
@endsection
