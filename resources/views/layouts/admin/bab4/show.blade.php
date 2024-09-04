@extends('layouts.admin.main')

@section('title', 'Detail BAB IV')

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
        /* list-style-type: lower-alpha; */
        margin-left: 20px;
    }
    .list ul ul {
        list-style-type: circle;
    }
    .indent {
        text-indent: 48px; /* Adjust the value as needed */
        margin-left: 20px; /* Adjust the left margin if needed */
    }
    .indent1 {
        text-indent: 90px; /* Adjust the value as needed */
        margin-left: 20px; /* Adjust the left margin if needed */
    }
    table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid black; /* Garis border hitam */
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

        /* tr:hover {
            background-color: #f1f1f1;
        } */

       
</style>

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail BAB IV</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <a href="{{ route('layouts.admin.bab3.index') }}">
                    <button class="btn btn-primary mb-3"><i class="fa fa-arrow-left"></i> Back </button>
                </a>
                {{-- <a href="{{ route('bab3.exportPdf', $bab3->id) }} "target="_blank">
                    <button class="btn btn-danger mb-3"><i class="fa fa-file-pdf"></i> Export to PDF </button>
                </a> --}}
                {{-- <a href="{{ route('bab3.exportWord', $bab3->id) }}">
                    <button class="btn btn-success mb-3"><i class="fa fa-file-word"></i> Export to Word </button>
                </a> --}}
                
                <div class="document-content">
                    <h1>BAB IV</h1>
                    <h1>TUJUAN DAN SASARAN</h1><br>
                    <h4>4.1. Tujuan dan Sasaran Rentra Perangkat Daerah Kota Madiun Tahun 2025-2026</h4>
                   

                            <p class="indent">Dalam mengukur keberhasilan suatu organisasi diperlukan Tujuan dan Sasaran Perangkat Daerah, sehingga pelaksanaan pembangunan khususnya pada 
                                <span style="color: rgb(11, 242, 11);">....</span> dapat terarah. Keberhasilan untuk mencapai tujuan dan sasaran tersebut akan mendukung pencapaian Tujuan dan Sasaran RPJMD/RPD Kota Madiun. 
                                Tujuan dan sasaran perangkat daerah beserta indikator kinerjanya disajikan dalam tabel berikut:</p>
                        </ol>
                        <p style="text-align: center">Tabel 4.1.</p>
                        <p style="text-align: center">Tujuan dan Sasaran Jangka Menengah Pelayanan Perangkat Daerah</p>
                        <table>
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center">No.</th>
                                    <th rowspan="2" class="text-center">Tujuan</th>
                                    <th rowspan="2" class="text-center">Sasaran</th>
                                    <th rowspan="2" class="text-center">Indikator Tujuan/Sasaran</th>
                                    <th colspan="5" class="text-center">Target Kinerja Tujuan/Sasaran pada Tahun ke-</th>
                                </tr>
                                <tr>
                                    <th class="text-center">1</th>
                                    <th class="text-center">2</th>
                                    <th class="text-center">3</th>
                                    <th class="text-center">4</th>
                                    <th class="text-center">5</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                            <td class="text-center"></td>
                                   
                                    </tr>
                                 
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            
                                                <td class="text-center"></td>
                                        
                                        </tr>
                                        
                                  
                             
                            </tbody>
                        </table>
                        
                        
                        <p class="indent">Sebagaimana tabel di atas 
                            maka terdapat permasalahan-permasalahan pelayanan dan faktor-faktor yang mempengaruhi permasalahan tersebut yaitu :</p>

                    <h4>3.2. Isu Strategis</h4>
                    <p class="indent">Identifikasi hasil reviu faktor-faktor pelayanan perangkat daerah 
                        yang mempengaruhi permasalahan pelayanan perangkat daerah ditinjau dari :</p>
                        <ol>
                            <li>Gambaran pelayanan perangkat daerah </li>
                            <li>Sasaran jangka menengah pada renstra Kementerian/Lembaga</li>
                            <li>Sasaran jangka menengah dari renstra Perangkat Daerah provinsi</li>
                            <li>Implikasi RTRW bagi pelayanan Perangkat Daerah</li>
                            <li>Implikasi KLHS bagi pelayanan Perangkat Daerah</li>
                        </ol>
                        <p class="indent">Sehingga teridentifikasi isu-isu strategis, dan hasil penentuan isu strategis 
                            dengan metode USG (Urgency, Seriousness dan Growth), maka isu strategis dinas/badan <span style="color: rgb(11, 242, 11);">{{ $selectedOpd['nama_opd'] ?? 'N/A' }}</span> Yang akan  ditangani  dalam renstra selama ….. tahun dan prioritas penanganannnya pada tahun rencana adalah :</p>    
                
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
        padding: 15px; /* Padding for content spacing */
        border: 1px solid #ddd; /* Border to match form editor styling */
        border-radius: 4px; /* Rounded corners to match form editor */
        background-color: #f9f9f9; /* Background color to match form editor */
    }
    .document-content p {
        font-size: 1rem;
        line-height: 1.6;
        margin-top: 10px;
        margin-bottom: 10px; /* Ensure spacing between paragraphs */
    }
    .btn-primary {
        margin-bottom: 20px;
    }
    
</style>
@endsection
