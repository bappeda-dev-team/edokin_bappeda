@extends('layouts.opd.main')

@section('title', 'Detail BAB VI')



@section('content')
<style>
    body {
        /* font-family: Arial, sans-serif; */
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
<section class="section">
    <div class="section-header">
        <h1>Detail BAB VI</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <a href="{{ route('layouts.opd.bab6.index') }}">
                    <button class="btn btn-primary mb-3"><i class="fa fa-arrow-left"></i> Back </button>
                </a>
                <a href="{{ route('opd.bab6.exportPdf',$bab6->id) }} "target="_blank">
                    <button class="btn btn-danger mb-3"><i class="fa fa-file-pdf"></i> Export to PDF </button>
                </a>

                <div class="document-content">
                    <h1>BAB VI</h1>
                    <h1>RENCANA PROGRAM DAN KEGIATAN SERTA PENDANAAN</h1><br>
            

                    <p class="indent">Dalam menunjang tercapainya tujuan dan sasaran, maka perangkat daerah memerlukan program, kegiatan dan sub kegiatan yang akan menjadi acuan pelaksanaan Rencana Kerja (Renja) Perangkat Daerah. Renja dalam periodenisasi Renstra adalah sebagai berikut :
                    </p>

                    <p style="text-align: center">Tabel 6.1</p>
                    <p style="text-align: center">Rencana Program, Kegiatan, Sub Kegiatan, dan Pendanaan Perangkat Daerah
                        Kota Madiun
                        </p>
                    <p>Kode Perangkat daerah   :<span style="color: rgb(11, 242, 11);">{{ $bab6->kode_opd}}</span> </p>    
                    <p>Nama Perangkat daerah   : <span style="color: rgb(11, 242, 11);">{{$nama_opd}}</span></p>    
                    <table>
                    <thead>
                    <tr>
                        <th rowspan="3">Tujuan</th>
                        <th rowspan="3">Sasaran</th>
                        <th rowspan="3">Kode</th>
                        <th rowspan="3">Program, Kegiatan dan Sub Kegiatan</th>
                        <th rowspan="3">Indikator Kinerja Tujuan, Sasaran, Program, Kegiatan dan Sub Kegiatan</th>
                        <th rowspan="3">Data Capaian Awal Perencanaan (realisasi)</th>
                        <th colspan="10">Target Kinerja</th>
                        <th rowspan="3">Keterangan</th>
                    </tr>
                    <tr>
                            <!-- Repeat for each year/target -->
                        <th colspan="2">Tahun</th>
                        <th colspan="2">Tahun</th>
                        <th colspan="2">Tahun</th>
                        <th colspan="2">Tahun</th>
                        <th colspan="2">Tahun</th>
                    </tr>
                    <tr>
                        <th>Target</th>
                        <th>Rp</th>
                        <th>Target</th>
                        <th>Rp</th>
                        <th>Target</th>
                        <th>Rp</th>
                        <th>Target</th>
                        <th>Rp</th>
                        <th>Target</th>
                        <th>Rp</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="height: 30px;">
                        <td colspan="4"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                        <!-- First Tujuan and Sasaran Rows -->
                    <tr>
                        <td colspan="4">Tujuan Perangkat Daerah.............</td>
                        
                        <td>Indikator Tujuan</td>
                        <td colspan="12"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">Sasaran Perangkat Daerah..............</td>
                        <td>Indikator Sasaran</td>
                        <td colspan="12"></td>
                    </tr>
                        <!-- Program Perangkat Daerah -->
                        <tr>
                        <td></td>
                        <td></td>
                        <td>kode sesuai kode pada aplikasi sipd</td>
                        <td>Program Perangkat Daerah</td>
                        <td>Indikator Program</td>
                        <td>................</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td></td>
                    </tr>
                        <!-- Kegiatan Perangkat Daerah -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>kode sesuai kode pada aplikasi sipd</td>
                        <td style="padding-left: 20px;">Kegiatan Perangkat Daerah</td>
                        <td>Indikator Kegiatan</td>
                        <td>................</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td></td>
                    </tr>
                        <!-- Sub Kegiatan Perangkat Daerah -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>kode sesuai kode pada aplikasi sipd</td>
                        <td style="padding-left: 40px;">Sub Kegiatan Perangkat Daerah</td>
                        <td>Indikator Sub Kegiatan</td>
                        <td>................</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td></td>
                    </tr>
                        <!-- Repeat Structure for Next Tujuan and Sasaran -->
                    <tr>
                        <td colspan="4">Tujuan Perangkat Daerah.............</td>
                        <td>Indikator Tujuan</td>
                        <td colspan="12"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">Sasaran Perangkat Daerah..............</td>
                        <td>Indikator Sasaran</td>
                        <td></td>
                        <td></td>
                        <td colspan="12"></td>
                    </tr>
                        <!-- Program, Kegiatan, and Sub Kegiatan -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>kode sesuai kode pada aplikasi sipd</td>
                        <td>Program Perangkat Daerah</td>
                        <td>Indikator Program</td>
                        <td>................</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>kode sesuai kode pada aplikasi sipd</td>
                        <td style="padding-left: 20px;">Kegiatan Perangkat Daerah</td>
                        <td>Indikator Kegiatan</td>
                        <td>................</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>kode sesuai kode pada aplikasi sipd</td>
                        <td style="padding-left: 40px;">Sub Kegiatan Perangkat Daerah</td>
                        <td>Indikator Sub Kegiatan</td>
                        <td>................</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td>.....</td>
                        <td></td>
                    </tr>
                    </tbody>
                    </table>

                    

                    <div class="indent"><span style="color: rgb(250, 5, 5);">{!!$bab6->uraian!!}</span></div>
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
