@extends('layouts.opd.main')

@section('title', 'Detail BAB II')


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
            /* list-style-type: lower-alpha; */
            margin-left: 20px;
        }

        .list ul ul {
            list-style-type: circle;
        }

        .indent {
            text-indent: 48px;
            /* Adjust the value as needed */
            margin-left: 20px;
            /* Adjust the left margin if needed */
        }

        .indent1 {
            text-indent: 90px;
            /* Adjust the value as needed */
            margin-left: 20px;
            /* Adjust the left margin if needed */
        }


        .list-item {
            /* display: flex;
                            justify-content: space-around; */
            margin-bottom: 5px;
            /* Space between items */
        }

        .spacer {
            padding-right: 900px;
            /* Prevents the colon from shrinking */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid black;
            /* Garis border hitam */
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
     <link rel="stylesheet" href="https://unpkg.com/treeflex/dist/css/treeflex.css">
    <section class="section">
        <div class="section-header">
            <h1>Detail BAB II</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <a href="{{ route('layouts.opd.bab2.index') }}">
                        <button class="btn btn-primary mb-3"><i class="fa fa-arrow-left"></i> Back </button>
                    </a>
                    <a href="{{ route('opd.bab2.exportPdf', $bab2->id) }} "target="_blank">
                        <button class="btn btn-danger mb-3"><i class="fa fa-file-pdf"></i> Export to PDF </button>
                    </a>
                    {{-- <a href="{{ route('bab2.exportWord', $bab1->id) }}">
                    <button class="btn btn-success mb-3"><i class="fa fa-file-word"></i> Export to Word </button>
                </a> --}}

                    <div class="document-content">
                        <h1>BAB II</h1>
                        <h1>HASIL EVALUASI RENJA PERANGKAT DAERAH TAHUN LALU</h1><br>
                        <h4>2.1 Tugas, Fungsi dan Struktur Organisasi Perangkat Daerah</h4>
                        <p class="indent">
                            @php
                                $selectedOpd = null;
                                foreach ($urusan_opd as $opd) {
                                    if ($opd['kode_opd'] == $bab2->kode_opd) {
                                        $selectedOpd = $opd;
                                        break;
                                    }
                                }

                                $bidangUrusanText = '';
                                if ($selectedOpd) {
                                    foreach ($selectedOpd['urusan_opd'] as $urusan) {
                                        if (
                                            isset($urusan['bidang_urusan_opd']) &&
                                            is_array($urusan['bidang_urusan_opd'])
                                        ) {
                                            foreach ($urusan['bidang_urusan_opd'] as $index => $bidang) {
                                                $bidangUrusanText .= $bidang['bidang_urusan'];
                                                if ($index < count($urusan['bidang_urusan_opd']) - 1) {
                                                    $bidangUrusanText .= ' serta ';
                                                }
                                            }
                                        }
                                    }
                                }
                            @endphp

                        <p class="indent"><span
                                style="color: rgb(11, 242, 11);">{{ $selectedOpd['nama_opd'] ?? 'N/A' }}</span> mengelola
                            bidang urusan <span style="color: rgb(11, 242, 11);">{{ $bidangUrusanText }} </span>
                            yang telah dibentuk sesuai Peraturan Daerah Kota Madiun Nomor 3 Tahun 2016 tentang Pembentukan
                            dan Susunan Perangkat Daerah sebagaimana telah diubah terakhir dengan Peraturan Daerah Kota
                            Madiun Nomor 8 Tahun 2020.</p>
                        </p>
                        </ol>
                        {{-- <p class="indent">Tugas <span
                                style="color: rgb(11, 242, 11);">{{ $selectedOpd['nama_opd'] ?? 'N/A' }}</span> Dengan
                            rincian tugas :</p>
                        <div class="list">
                            <ol style="list-style-type: none">
                                <ul style="list-style-type: none; padding-left: 0;">
                                    @if (empty($tugas_fungsi) || count($tugas_fungsi) === 0)
                                        <li class="list-item text-center">Tidak ada data tersedia.</li>
                                    @else
                                        @foreach ($tugas_fungsi as $index => $tugas)
                                            @if ($index % 3 === 0)
                                                <!-- Menampilkan nama jabatan -->
                                                <li class="list-item" style="color: rgb(11, 242, 11); display: flex; align-items: flex-start; padding: 5px 0;">
                                                <span style="min-width: 200px;">
                                                    {{ ucwords(strtolower($tugas)) }} 
                                                </span>
                                                @elseif ($index % 3 === 1)
                                                    <span style="color:red; display: inline-block;">: {{ $tugas }}</>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </ol>
                        </div>
                        <p class="indent">Fungsi <span
                                style="color: rgb(11, 242, 11);">{{ $selectedOpd['nama_opd'] ?? 'N/A' }}</span> Dengan
                            rincian tugas :</p>
                        <div class="list">
                            <ol style="list-style-type: none">
                                <ul style="list-style-type: none; padding-left: 0;">
                                    @if (empty($tugas_fungsi) || count($tugas_fungsi) === 0)
                                        <li class="list-item text-center">Tidak ada data tersedia.</li>
                                    @else
                                        @foreach ($tugas_fungsi as $index => $fungsi)
                                            @if ($index % 3 === 0)
                                                <!-- Menampilkan nama jabatan -->
                                                <li class="list-item" style="color: rgb(11, 242, 11); display: flex; align-items: flex-start; padding: 5px 0;">
                                                    <span style="min-width: 200px;">
                                                    {{ ucwords(strtolower($fungsi)) }} 
                                                    </span>
                                                @elseif ($index % 3 === 2)
                                                    <span style="color:red; display: inline-block;">: {{ $fungsi }}</>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </ol>

                            <p style="text-align: center">Gambar Struktur Organisasi :
                            </p>
                        </div> --}}
                        <p class="indent">Tugas <span
                                style="color: rgb(11, 242, 11);">{{ $selectedOpd['nama_opd'] ?? 'N/A' }}</span> Dengan
                            rincian tugas :</p>
                        <div class="list">
                            <ol style="list-style-type: none">
                                <ul style="list-style-type: none; padding-left: 0;">
                                    @if (empty($tugas_fungsi) || count($tugas_fungsi) === 0)
                                        <li class="list-item text-center">Tidak ada data tersedia.</li>
                                    @else
                                        @foreach ($tugas_fungsi as $item)
                                            <!-- Menampilkan nama jabatan -->
                                            <li class="list-item"
                                                style="color: rgb(11, 242, 11); display: flex; align-items: flex-start; padding: 5px 0;">
                                                <span style="min-width: 200px;">
                                                    {{ ucwords(strtolower($item['nama_jabatan'])) }}
                                                </span>
                                                <span style="color:red; display: inline-block;">: &nbsp;</span>
                                                <span style="color:red; display: inline-block;"> {!! nl2br(e($item['tugas_jabatan'])) !!}</span>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </ol>
                        </div>
                        <p class="indent">Fungsi <span
                                style="color: rgb(11, 242, 11);">{{ $selectedOpd['nama_opd'] ?? 'N/A' }}</span> Dengan
                            rincian tugas :</p>
                        <div class="list">
                            <ol style="list-style-type: none">
                                <ul style="list-style-type: none; padding-left: 0;">
                                    @if (empty($tugas_fungsi) || count($tugas_fungsi) === 0)
                                        <li class="list-item text-center">Tidak ada data tersedia.</li>
                                    @else
                                        @foreach ($tugas_fungsi as $item)
                                            <!-- Menampilkan nama jabatan -->
                                            <li class="list-item"
                                                style="color: rgb(11, 242, 11); display: flex; align-items: flex-start; padding: 5px 0;">
                                                <span style="min-width: 200px;">
                                                    {{ ucwords(strtolower($item['nama_jabatan'])) }}
                                                </span>
                                                    <span style="color:red; display: inline-block;">: &nbsp;</span>
                                                    <span style="color:red; display: inline-block;"> {!! nl2br(e($item['fungsi_jabatan'])) !!}</span>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </ol>

                            <p style="text-align: center">Gambar Struktur Organisasi
                            </p>
                        </div>
                            <div class="tf-tree" style="text-align: center">
                                <ul>
                                  <li>
                                    <span class="tf-nc">2</span>
                                    <ul>
                                      <li><span class="tf-nc">4</span>
                                       <ul>
                                          <li><span class="tf-nc">A</span></li>
                                          <li><span class="tf-nc">B</span></li>
                                          <li><span class="tf-nc">C</span></li>
                                      </ul>
                                    </li>
                                    </ul>
                                  </li>
                                </ul>
                              </div>
                            <p style="text-align: center">Gambar 2.1</p>
                        <h4>2.2 Sumber Daya Perangkat Daerah</h4>
                        <p class="indent"><span
                                style="color: rgb(11, 242, 11);">{{ $selectedOpd['nama_opd'] ?? 'N/A' }}</span>
                            memiliki sumber daya manusia yang bertugas dalam pengembangan organisasi dengan rincian personil
                            sebagai berikut:
                        </p>
                        <p style="text-align: center">Tabel 2.1</p>
                        <p style="text-align: center">Sumber Daya Manusia Perangkat Daerah
                            Kota Madiun</p>
                        <table>
                            <thead>
                                <tr>
                                    <th rowspan="2">No.</th>
                                    <th rowspan="2">Jabatan</th>
                                    <th colspan="4">Status Kepegawaian</th>
                                    <th colspan="6">Pendidikan Terakhir</th>
                                </tr>
                                <tr>
                                    <th>PNS</th>
                                    <th>PPPK</th>
                                    <th>Kontrak</th>
                                    <th>Upah</th>
                                    <th>SD/SMP</th>
                                    <th>SMA</th>
                                    <th>D1/D3</th>
                                    <th>D4/S1</th>
                                    <th>S2/S3</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (empty($sumber_daya_manusia) || count($sumber_daya_manusia) === 0)
                                    <tr>
                                        <td colspan="11" class="text-center">Tidak ada sumber daya manusia tersedia</td>
                                    </tr>
                                @else
                                    @foreach ($sumber_daya_manusia as $index => $jabatan)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ ucwords(strtolower($jabatan['nama_jabatan'])) }}</td>
                                            <td>{{ $jabatan['status_jumlah_kepegawaian']['PNS'] ?? 0 }}</td>
                                            <td>{{ $jabatan['status_jumlah_kepegawaian']['PPPK'] ?? 0 }}</td>
                                            <td>{{ $jabatan['status_jumlah_kepegawaian']['Kontrak'] ?? 0 }}</td>
                                            <td>{{ $jabatan['status_jumlah_kepegawaian']['Upah'] ?? 0 }}</td>
                                            <td>{{ $jabatan['pendidikan_terakhir']['SD/SMP'] ?? 0 }}</td>
                                            <td>{{ $jabatan['pendidikan_terakhir']['SMA'] ?? 0 }}</td>
                                            <td>{{ $jabatan['pendidikan_terakhir']['D1/D3'] ?? 0 }}</td>
                                            <td>{{ $jabatan['pendidikan_terakhir']['D4/S1'] ?? 0 }}</td>
                                            <td>{{ $jabatan['pendidikan_terakhir']['S2/S3'] ?? 0 }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                        <p class="indent">Selain sumber daya manusia, <span
                                style="color: rgb(11, 242, 11);">{{ $selectedOpd['nama_opd'] ?? 'N/A' }}</span>
                            juga memiliki aset yang mendukung kelancaran pelaksanaan tugas organisasi yaitu:
                        </p>

                        <p style="text-align: center">Tabel 2.2</p>
                        <p style="text-align: center">Aset Pendukung Perangkat Daerah Kota Madiun</p>

                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Asset Pendukung</th>
                                    <th>Jumlah</th>
                                    <th colspan="3">Kondisi Asset</th>
                                    <th>Perolehan Asset</th>
                                    <th>Keterangan</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Baik</th>
                                    <th>Cukup</th>
                                    <th>Kurang</th>
                                    <th>Tahun</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (empty($asets) || count($asets) === 0)
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada aset tersedia</td>
                                    </tr>
                                @else
                                    @foreach ($asets as $index => $aset)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ ucwords(strtolower($aset['aset'])) }}</td>
                                            <td>{{ $aset['jumlah_aset'] }} {{ $aset['satuan_aset'] }}</td>
                                            <td>{{ $aset['kondisi']['Baik'] ?? 0 }}</td>
                                            <td>{{ $aset['kondisi']['Cukup'] ?? 0 }}</td>
                                            <td>{{ $aset['kondisi']['Kurang'] ?? 0 }}</td>
                                            <td>{{ implode(', ', $aset['tahun_perolehan_aset'] ?? []) }}</td>
                                            <td>{{ $aset['keterangan'] }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                        <p style="text-align: center"><span style="color: rgb(255, 0, 0);">{!! strip_tags($bab2['uraian_asets'] ?? 'N/A', '<br><b><u><i><strong><em>') !!}</span>
                        </p>

                        <h4>2.3 Kinerja Pelayanan Perangkat Daerah</h4>
                        <p class="indent">Pelayanan kinerja perangkat daerah yang dilaksanakan pada periode tahun sebulmnya
                            memuat indikator SPM untuk Urusan Wajib, Indikator Kinerja Daerah (IKD), indikator Tujuan dan
                            Indikator Sasaran sesuai dengan yang telah diampu dan di amanatkan pada
                            <span style="color: rgb(11, 242, 11);">{{ $selectedOpd['nama_opd'] ?? 'N/A' }}</span>

                        </p>

                        <p style="text-align: center">Tabel 2.3</p>
                        <p style="text-align: center">Pencapaian Kinerja Pelayanan Perangkat
                            Daerah Selama 5 (lima) Tahun Terakhir Kota Madiun
                        </p>

                        <p class="indent">
                            <span style="color: rgb(11, 242, 11);">{{ $selectedOpd['nama_opd'] ?? 'N/A' }}</span>
                        </p>

                        <table border="1" cellspacing="0" cellpadding="5">
                            <thead>
                                <tr>
                                    <th rowspan="2">NO</th>
                                    <th rowspan="2">Indikator Kinerja sesuai Tugas dan Fungsi Perangkat Daerah</th>
                                    <th rowspan="2">Tergat NSPK</th>
                                    <th rowspan="2">Target IKK/IKD</th>
                                    <th rowspan="2">Target Indikator Lainnya</th>
                                    <th colspan="5">Target Renstra Perangkat Daerah Tahun ke-</th>
                                    <th colspan="5">Realisasi Capaian Tahun ke-</th>
                                    <th colspan="5">Rasio Capaian pada Tahun ke-</th>
                                </tr>
                                <tr>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>(1)</td>
                                    <td>(2)</td>
                                    <td>(3)</td>
                                    <td>(4)</td>
                                    <td>(5)</td>
                                    <td>(6)</td>
                                    <td>(7)</td>
                                    <td>(8)</td>
                                    <td>(9)</td>
                                    <td>(10)</td>
                                    <td>(11)</td>
                                    <td>(12)</td>
                                    <td>(13)</td>
                                    <td>(14)</td>
                                    <td>(15)</td>
                                    <td>(16)</td>
                                    <td>(17)</td>
                                    <td>(18)</td>
                                    <td>(19)</td>
                                    <td>(20)</td>
                                </tr>
                                <!-- Additional rows can be added here -->
                                <tr>
                                    <td colspan="20">(dst…)</td>
                                    {{-- <td></td>
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
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td> --}}


                                </tr>
                            </tbody>
                        </table>

                        <p style="text-align: center">Tabel 2.4</p>
                        <p style="text-align: center">Anggaran dan Realisasi Pendanaan Pelayanan Perangkat Daerah
                            Selama 5 (lima) Tahun Terakhir
                            Kota Madiun</p>

                        <table>
                            <thead>
                                <tr>
                                    <th rowspan="3">Uraian Kewenangan Perangkat Daerah</th>
                                    <th colspan="5">Target Renstra Perangkat Daerah Tahun ke-</th>
                                    <th colspan="5">Realisasi Capaian Tahun ke-</th>
                                    <th colspan="5">Rasio Capaian pada Tahun ke-</th>
                                    <th colspan="2">Rata-Rata Pertumbuhan</th>
                                </tr>
                                <tr>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>Anggaran</th>
                                    <th>Realisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>(1)</td>
                                    <td>(2)</td>
                                    <td>(3)</td>
                                    <td>(4)</td>
                                    <td>(5)</td>
                                    <td>(6)</td>
                                    <td>(7)</td>
                                    <td>(8)</td>
                                    <td>(9)</td>
                                    <td>(10)</td>
                                    <td>(11)</td>
                                    <td>(12)</td>
                                    <td>(13)</td>
                                    <td>(14)</td>
                                    <td>(15)</td>
                                    <td>(16)</td>
                                    <td>(17)</td>
                                    <td>(18)</td>
                                </tr>
                                <!-- Add more rows as needed -->
                                <tr>
                                    <td colspan="20">(Dst…)</td>

                                </tr>
                            </tbody>
                        </table>
                        <p class="indent">Berdasarkan tabel Pencapaian kinerja pelayanan Perangkat
                            Daerah terdapat beberapa indikator dalam kondisi :
                        </p>

                        <ol>
                            <li>
                                Tercapai, yaitu pada indikator :
                                <ul style="list-style-type: lower-alpha">
                                    <li><span style="color: rgb(11, 242, 11);">...</span> Faktor yang mempengaruhi
                                        keberhasilan <span style="color: rgb(11, 242, 11);">...</span> </li>
                                    <li><span style="color: rgb(11, 242, 11);">...</span> Faktor yang mempengaruhi
                                        keberhasilan <span style="color: rgb(11, 242, 11);">...</span> </li>
                                    <li><span style="color: rgb(11, 242, 11);">...</span> Faktor yang mempengaruhi
                                        keberhasilan <span style="color: rgb(11, 242, 11);">...</span> </li>

                                </ul>
                            </li>
                            <li>
                                Belum tercapai, yaitu pada indikator :
                                <ul style="list-style-type: lower-alpha">
                                    <li><span style="color: rgb(11, 242, 11);">...</span> Faktor yang mempengaruhi
                                        keberhasilan <span style="color: rgb(11, 242, 11);">...</span> </li>
                                    <li><span style="color: rgb(11, 242, 11);">...</span> Faktor yang mempengaruhi
                                        keberhasilan <span style="color: rgb(11, 242, 11);">...</span> </li>
                                    <li><span style="color: rgb(11, 242, 11);">...</span> Faktor yang mempengaruhi
                                        keberhasilan <span style="color: rgb(11, 242, 11);">...</span> </li>

                                </ul>
                            </li>
                        </ol>
                        <p class="indent">Sehingga potensi dan permasalahan yang timbul yang ditinjau
                            dari kinerja pelayanan periode sebelumnya tersebut adalah :
                        </p>
                        <ol>
                            <li><span style="color: rgb(11, 242, 11);">...</span></li>
                            <li><span style="color: rgb(11, 242, 11);">...</span></li>
                            <li><span style="color: rgb(11, 242, 11);">...</span></li>
                        </ol>

                        <h4>2.4 Kelompok Sasaran Layanan</h4>
                        <p class="indent">Sebagaimana tugas pokok dan fungsi perangkat daerah yang menjadi kewenangannya,
                            agar tercapai pelayanan yang berorientasi hasil serta menjaga Kerjasama yang baik dengan
                            stakeholder, mitra serta Kerjasama lainnya dalam penyelenggaraan pemerintahan daerah maka
                            diperlukan upaya
                            pemerintah daerah dalam menentukan kelompok sasaran yang akan terdampak dalam pelayanan pada
                            dinas/badan
                            <span style="color: rgb(11, 242, 11);">...</span><br>
                        <p class="indent">Kelompok sasaran <span style="color: rgb(11, 242, 11);">...</span> dalam
                            kegiatan yang akan dilaksanakan berupa kerjasama dalam pencapaian kinerja yaitu </p>

                        </p>
                        <ol style="list-style-type: lower-alpha">
                            <li>Mitra PD </li>
                            <li style=" list-style-type: none;"><span style="color: rgb(11, 242, 11);">...</span> </li>
                            <li>Dukungan Instansi/perusahaan</li>
                            <li style=" list-style-type: none;"><span style="color: rgb(11, 242, 11);">...</span> </li>
                            <li>Kerjasama dengan pemerintah daerah lain</li>
                            <li style=" list-style-type: none;"><span style="color: rgb(11, 242, 11);">...</span> </li>
                            </li>
                        </ol>
                        <div class="indent">
                            <span style="color: rgb(250, 5, 5);">{!! $bab2->uraian !!}</span>
                        </div>


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
            /* Padding for content spacing */
            border: 1px solid #ddd;
            /* Border to match form editor styling */
            border-radius: 4px;
            /* Rounded corners to match form editor */
            background-color: #f9f9f9;
            /* Background color to match form editor */
        }

        .document-content p {
            font-size: 1rem;
            line-height: 1.6;
            margin-top: 10px;
            margin-bottom: 10px;
            /* Ensure spacing between paragraphs */
        }

        .btn-primary {
            margin-bottom: 20px;
        }
    </style>
@endsection
