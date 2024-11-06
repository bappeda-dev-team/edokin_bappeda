@extends('layouts.opd.main')

@section('title', 'Detail BAB VII')



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
<section class="section">
    <div class="section-header">
        <h1>Detail BAB VII</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <a href="{{ route('layouts.opd.bab7.index') }}">
                    <button class="btn btn-primary mb-3"><i class="fa fa-arrow-left"></i> Back </button>
                </a>
                <a href="{{ route('opd.bab7.exportPdf',$bab7->id) }} "target="_blank">
                    <button class="btn btn-danger mb-3"><i class="fa fa-file-pdf"></i> Export to PDF </button>
                </a>

                <div class="document-content">
                    <h1>BAB VII</h1>
                    <h1>KINERJA PENYELENGGARAAN BIDANG URUSAN</h1><br>
                    <h4>7.1. Penentuan target keberhasilan pencapaian tujuan dan sasaran Renstra PD Tahun 2025-2026 melalui <h4 class="indent2">Indikator Kinerja Utama (IKU) Perangkat Daerah</h4>
                    <p class="indent1">menjalankan program, kegiatan serta sub kegiatan Perangkat Daerah guna optimalisasi pelayanan pemerintahan.
                        <span style="color: rgb(11, 242, 11);">{{$nama_opd}}</span> dalam penyelenggaraannya menetapkan indikator yang menjadi tolok ukur keberhasilan yaitu Indikator Kinerja Utama (IKU) sebagai berikut:</p> 
                    </p>

                    <p style="text-align: center">Tabel 7.1</p>
                    <p style="text-align: center">Indikator Kinerja Utama (IKU) 
                        </p>
                        <table>
                            <thead>
                                <tr>
                                    <th rowspan="2">No.</th>
                                    <th rowspan="2">Indikator Kinerja</th>
                                    <th rowspan="2">Satuan</th>
                                    <th colspan="5">Target Indikator Kinerja pada Tahun ke-</th>
                                    <th rowspan="2">Keterangan</th>
                                </tr>
                                <tr>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                </tr>
                                <tr>
                                    <th>(1)</th>
                                    <th>(2)</th>
                                    <th>(3)</th>
                                    <th>(4)</th>
                                    <th>(5)</th>
                                    <th>(6)</th>
                                    <th>(7)</th>
                                    <th>(8)</th>
                                    <th>(9)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Indikator kinerja 1</td>
                                    <td>....</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Tujuan/Sasaran PD</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Indikator kinerja 2</td>
                                    <td>....</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Tujuan/Sasaran PD</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>dst</td>
                                    <td>....</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <p>Penjelasan Definisi Operasional :</p>
                        <p><span style="color: rgb(11, 242, 11);">penjelasan iku 1</span></p>
                        <p><span style="color: rgb(11, 242, 11);">penjelasan iku 2</span></p>

                        <h4>7.2. Penentuan target keberhasilan pencapaian tujuan dan sasaran Renstra PD Tahun 2025-2026 melalui <h4 class="indent2">Indikator Kinerja Kunci (IKK) Perangkat Daerah</h4>
                        <p class="indent">Selain Indikator Kinerja Utama, perangkat daerah juga diwajibkan untuk 
                            melaksanakan kinerja penyelanggaraan pemerintahan sesuai dengan bidang urusan yang diampu, tolok ukur kinerja bidang urusan yang menjadi Indikator Kinerja Kunci (IKK) adalah sebagai berikut:</p> 
                        </p>

                        <p style="text-align: center">Tabel 7.2</p>
                        <p style="text-align: center">Indikator Kinerja Kunci (IKK)</p>
                        
                        <table>
                            <thead>
                              <tr>
                                <th rowspan="2">No.</th>
                                <th rowspan="2">Indikator Kinerja</th>
                                <th rowspan="2">Satuan</th>
                                <th colspan="3">Target Indikator Kinerja Pada Tahun</th>
                                <th rowspan="2">Keterangan</th>
                              </tr>
                              <tr>
                                <th>2024</th>
                                <th>2025</th>
                                <th>2026</th>
                              </tr>
                              <tr>
                                <th>(1)</th>
                                <th>(2)</th>
                                <th>(3)</th>
                                <th>(4)</th>
                                <th>(5)</th>
                                <th>(6)</th>
                                <th>(7)</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>Indikator Kinerja 1</td>
                                <td>....... </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>SPM</td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>Indikator Kinerja 2</td>
                                <td>....... </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Tujuan PD</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Indikator Kinerja 2</td>
                                <td>....... </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Sasaran PD</td>
                              </tr>
                              <tr>
                                <td>4</td>
                                <td>Indikator Kinerja 3</td>
                                <td>....... </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Program PD</td>
                              </tr>
                              <tr>
                                <td>5</td>
                                <td>Indikator Kinerja 4</td>
                                <td>....... </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>LPPD</td>
                              </tr>
                              <tr>
                                <td>6</td>
                                <td>Indikator Kinerja 5</td>
                                <td>....... </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>SDGs</td>
                              </tr>
                            </tbody>
                          </table>
                    <div class="indent"><span style="color: rgb(250, 5, 5);">{!!$bab7->uraian!!}</span></div>
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
