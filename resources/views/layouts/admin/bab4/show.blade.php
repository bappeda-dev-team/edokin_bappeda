@extends('layouts.admin.main')

@section('title', 'Detail BAB IV')



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
    .tf-cell {
        text-align: center;
        padding: 10px;
        /* border: 5px; */
    }
    .tf-child-row td {
        border-top: 0;
    }
    .tf-child-cell {
        padding-top: 0;
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/treeflex/dist/css/treeflex.css">
<section class="section">
    <div class="section-header">
        <h1>Detail BAB IV</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <a href="{{ route('layouts.admin.bab4.index') }}">
                    <button class="btn btn-primary mb-3"><i class="fa fa-arrow-left"></i> Back </button>
                </a>
                <a href="{{ route('bab4.exportPdf', $bab4->id) }} "target="_blank">
                    <button class="btn btn-danger mb-3"><i class="fa fa-file-pdf"></i> Export to PDF </button>
                </a>

                <div class="document-content">
                    <h1>BAB IV</h1>
                    <h1>TUJUAN DAN SASARAN</h1><br>
                    <h4>4.1. Tujuan dan Sasaran Rentra Perangkat Daerah Kota Madiun Tahun 2025-2026</h4>

                    <p class="indent">Dalam mengukur keberhasilan suatu organisasi diperlukan Tujuan dan Sasaran Perangkat Daerah, sehingga pelaksanaan pembangunan khususnya pada 
                        <span style="color: rgb(11, 242, 11);">{{$nama_opd}}</span> dapat terarah. Keberhasilan untuk mencapai tujuan dan sasaran tersebut akan mendukung pencapaian Tujuan dan Sasaran RPJMD/RPD Kota Madiun. 
                        Tujuan dan sasaran perangkat daerah beserta indikator kinerjanya disajikan dalam tabel berikut:
                    </p>
                    
                    <p style="text-align: center">Tabel 4.1.</p>
                    <p style="text-align: center">Tujuan dan Sasaran Jangka Menengah Pelayanan Perangkat Daerah</p>

                    <table>
                        <thead>
                            <tr>
                                <th rowspan="2">No.</th>
                                <th rowspan="2">Tujuan</th>
                                <th rowspan="2">Sasaran</th>
                                <th rowspan="2">Indikator Tujuan/Sasaran</th>
                                <th colspan="5">Target Kinerja Tujuan/Sasaran pada Tahun ke-</th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_array($tujuan_opd) && !empty($tujuan_opd))
                                @foreach ($tujuan_opd as $index => $tujuan)
                                    @foreach ($tujuan['indikator_tujuan'] as $indikator)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $tujuan['tujuan'] }}</td>
                                            <td>{{ $sasaran_opd }}</td>
                                            <td>{{ $indikator['indikator'] }}</td>
                                            @foreach ($indikator['target_tujuan'] as $target)
                                                <td class="text-center">{{ $target['target'] }} {{ $target['satuan'] }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9" class="text-center">Data tidak tersedia</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    <p style="text-align: center">Tabel 4.2.</p>
                    <p style="text-align: center">Tujuan dan Sasaran Jangka Menengah Pelayanan Perangkat Daerah Keterkaitan Tujuan dan Sasaran Jangka Menengah Pelayanan Perangkat Daerah
                        Dalam mendukung Sasaran RPD</p>
                    <table>
                        <thead>
                            <tr>
                                <th rowspan="1">No.</th>
                                <th rowspan="1">Sasaran RPD</th>
                                <th rowspan="1">Tujuan Perangkat Daerah</th>
                                <th rowspan="1">Sasaran Perangkat Daerah</th>
                            </tr>
                            <tr>
                                <th>(1)</th>
                                <th>(2)</th>
                                <th>(3)</th>
                                <th>(4)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><span style="color: rgb(11, 242, 11);">{{$sasaran_opd}}</span></td>
                                <td><span style="color: rgb(11, 242, 11);">{{$tujuan_opd}}</span></td>
                                <td>Sasaran OPD 1 (bisa lebih dari 1)</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Sasaran RPD 2</td>
                                <td>Tujuan OPD 2</td>
                                <td>Sasaran OPD 2 (bisa lebih dari 1)</td>
                            </tr>
                        </tbody>
                    </table>

                    <p style="text-align: center">Tabel 4.3.</p>
                    <p style="text-align: center">Keterkaitan Tujuan dan Sasaran Jangka Menengah Pelayanan Perangkat Daerah
                        Dalam mendukung NSPK yang ditetapkan oleh Pemerintah Pusat sesuai kewenangan daerah</p>
                    <table>
                        <thead>
                            <tr>
                                <th rowspan="1">No.</th>
                                <th rowspan="1">Norma, Strandar, Prosedur, dan Kriteria (NSPK)</th>
                                <th rowspan="1">Tujuan Perangkat Daerah</th>
                                <th rowspan="1">Sasaran Perangkat Daerah</th>
                            </tr>
                            <tr>
                                <th>(1)</th>
                                <th>(2)</th>
                                <th>(3)</th>
                                <th>(4)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>NSPK 1</td>
                                <td>Tujuan OPD 1</td>
                                <td>Sasaran OPD 1 (bisa lebih dari 1)</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>NSPK 2</td>
                                <td>Tujuan OPD 2</td>
                                <td>Sasaran OPD 2 (bisa lebih dari 1)</td>
                            </tr>
                        </tbody>
                    </table>
                    <h4>4.2. Cascading Kinerja Perangkat Daerah</h4>
                    
                    <div class="tf-tree">
                        <ul>
                          <li>
                            <span class="tf-nc">
                               <table>
                                  <!-- Nested Row Inside the Third Child -->
                                    <tr><td class="tf-cell">A</td></tr>
                                    <tr><td class="tf-cell">B</td></tr>
                                </table>
                            </span>
                            <ul>
                              <li>
                                <span class="tf-nc">
                                  <table>
                                  <!-- Nested Row Inside the Third Child -->
                                    <tr><td class="tf-cell">C</td></tr>
                                    <tr><td class="tf-cell">D</td></tr>
                                </table>
                                </span>
                                </li>
                                <li>
                                <span class="tf-nc">
                                  <table>
                                  <!-- Nested Row Inside the Third Child -->
                                    <tr><td class="tf-cell">E</td></tr>
                                    <tr><td class="tf-cell">F</td></tr>
                                </table>
                                </span>
                                </li>
                                <li>
                                <span class="tf-nc">
                                  <table>
                                  <!-- Nested Row Inside the Third Child -->
                                    <tr><td class="tf-cell">G</td></tr>
                                    <tr><td class="tf-cell">H</td></tr>
                                </table>
                                </span>
                                </li>
                                <li>
                                <span class="tf-nc">
                                  <table>
                                  <!-- Nested Row Inside the Third Child -->
                                    <tr><td class="tf-cell">I</td></tr>
                                    <tr><td class="tf-cell">J</td></tr>
                                </table>
                                </span>
                                </li>
                                <li>
                                <span class="tf-nc">
                                  <table>
                                  <!-- Nested Row Inside the Third Child -->
                                    <tr><td class="tf-cell">K</td></tr>
                                    <tr><td class="tf-cell">L</td></tr>
                                </table>
                                </span>
                                </li>
                                <li>
                                <span class="tf-nc"><table>
                                  <!-- Nested Row Inside the Third Child -->
                                    <tr><td class="tf-cell">M</td></tr>
                                    <tr><td class="tf-cell">N</td></tr>
                                </table></span>
                                </li>
                                <li>
                                <span class="tf-nc">
                                  <table>
                                  <!-- Nested Row Inside the Third Child -->
                                    <tr><td class="tf-cell">O</td></tr>
                                    <tr><td class="tf-cell">P</td></tr>
                                </table>
                                </span>
                                </li>
                                <li>
                                <span class="tf-nc">
                                   <table>
                                          <!-- Nested Row Inside the Third Child -->
                                          <tr><td class="tf-cell">Q</td></tr>
                                          <tr><td class="tf-cell">R</td></tr>
                                      </table>
                                </span>
                                </li>
                            </ul>
                          </li>
                        </ul>
                      </div>

                   

                    <div class="indent">
                        <span style="color: rgb(250, 5, 5);">{!!$bab4->uraian!!}</span>
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