@extends('layouts.admin.main')

@section('title', 'Detail BAB III')



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

        /* tr:hover {
                background-color: #f1f1f1;
            } */
    </style>
    <section class="section">
        <div class="section-header">
            <h1>Detail BAB III</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <a href="{{ route('layouts.admin.bab3.index') }}">
                        <button class="btn btn-primary mb-3"><i class="fa fa-arrow-left"></i> Back </button>
                    </a>
                    <a href="{{ route('bab3.exportPdf', $bab3->id) }} "target="_blank">
                        <button class="btn btn-danger mb-3"><i class="fa fa-file-pdf"></i> Export to PDF </button>
                    </a>
                    <a href="{{ route('bab3.exportPdf2', $bab3->id) }} "target="_blank">
                        <button class="btn btn-danger mb-3"><i class="fa fa-file-pdf"></i> Export table </button>
                    </a>
                    {{-- <a href="{{ route('bab3.exportWord', $bab3->id) }}">
                    <button class="btn btn-success mb-3"><i class="fa fa-file-word"></i> Export to Word </button>
                </a> --}}

                    <div class="document-content">
                        <h1>BAB III</h1>
                        <h1>PERMASALAHAN DAN ISU STRATEGIS PERANGKAT DAERAH </h1><br>
                        <h4>3.1. Permasalahan Pelayanan Perangkat Daerah.</h4>
                        @php
                            $selectedOpd = null;
                            foreach ($urusan_opd as $opd) {
                                if ($opd['kode_opd'] == $bab3->kode_opd) {
                                    $selectedOpd = $opd;
                                    break;
                                }
                            }
                        @endphp

                        <p class="indent">Dalam menentukan masalah pokok, masalah, dan akar masalah perlu disusun analisis
                            pohon masalah sebagai bagain dari penentuan permasalahan yang riel dihadapai Perangkat Daerah
                            dalam penyelanggaraan urusan pemerintahan.
                            Sebagaimana analisi pohon masalah dapat disimpulkan permasalahan pada <span
                                style="color: rgb(11, 242, 11);">{{ $selectedOpd['nama_opd'] ?? 'N/A' }}</span> adalah
                            sebagai berikut: </p>
                        </ol>
                        <p style="text-align: center">Tabel 3.1.</p>
                        <p style="text-align: center">Pemetaan Permasalahan untuk Penentuan Prioritas dan Sasaran
                            Pembangunan Daerah</p>
                        <table>
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Masalah Pokok</th>
                                    <th>Masalah</th>
                                    <th>Akar Masalah</th> <!-- Kolom Tahun ditambahkan di sini -->
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($permasalahanList as $masalahPokok)
                                    @php 
                                        $masalahCount = count($masalahPokok['masalahs']);
                                        $rowspanMasalahPokok = 0;
                                    @endphp
                                    @foreach ($masalahPokok['masalahs'] as $masalah)
                                        @php 
                                            $akarMasalahCount = count($masalah['akar_masalahs']);
                                            $rowspanMasalahPokok += $akarMasalahCount;
                                        @endphp
                                    @endforeach
                                    
                                    @php $firstMasalah = true; @endphp
                                    @foreach ($masalahPokok['masalahs'] as $masalah)
                                        @php 
                                            $firstAkarMasalah = true;
                                            $akarMasalahCount = count($masalah['akar_masalahs']);
                                        @endphp
                                        @foreach ($masalah['akar_masalahs'] as $akarMasalah)
                                            <tr>
                                                @if ($firstMasalah && $firstAkarMasalah)
                                                    <td class="text-center" rowspan="{{ $rowspanMasalahPokok }}">
                                                        {{ $no++ }}
                                                    </td>
                                                @endif
                                                
                                                <!-- Display Masalah Pokok 1x once per masalah pokok -->
                                                @if ($firstMasalah && $firstAkarMasalah)
                                                    <td rowspan="{{ $rowspanMasalahPokok }}">
                                                        {{ $masalahPokok['masalah_pokok'] ?? 'Data tidak tersedia' }}
                                                    </td>
                                                @endif
                            
                                                <!-- Display Masalah 1x per masalah -->
                                                @if ($firstAkarMasalah)
                                                    <td rowspan="{{ $akarMasalahCount }}">
                                                        {{ $masalah['masalah'] ?? 'Data tidak tersedia' }}
                                                    </td>
                                                @endif
                                                
                                                <!-- Display Akar Masalah -->
                                                <td>
                                                    {{ $akarMasalah['akar_masalah'] ?? 'Data tidak tersedia' }}
                                                </td>
                                            </tr>
                                            @php $firstAkarMasalah = false; @endphp
                                        @endforeach
                                        @php $firstMasalah = false; @endphp
                                    @endforeach
                                @endforeach
                            </tbody>
                            
                        </table>


                        <p class="indent">Sebagaimana tabel di atas
                            maka terdapat permasalahan-permasalahan pelayanan dan faktor-faktor yang mempengaruhi
                            permasalahan tersebut yaitu :</p>

                        <h4>3.2. Isu Strategis</h4>
                        <p class="indent">Identifikasi hasil reviu faktor-faktor pelayanan perangkat daerah
                            yang mempengaruhi permasalahan pelayanan perangkat daerah ditinjau dari :</p>
                        <ol>
                            <li>Gambaran pelayanan perangkat daerah
                                <pre style="color: rgb(244, 11, 11);">{{ $bab3->uraian1 }}</pre>
                            </li>
                            <li>Sasaran jangka menengah pada renstra Kementerian/Lembaga
                                <pre style="color: rgb(244, 11, 11);">{{ $bab3->uraian2 }}</pre>
                            </li>
                            <li>Sasaran jangka menengah dari renstra Perangkat Daerah provinsi
                                <pre style="color: rgb(244, 11, 11);">{{ $bab3->uraian3 }}</pre>
                            </li>
                            <li>Implikasi RTRW bagi pelayanan Perangkat Daerah
                                <pre style="color: rgb(244, 11, 11);"> {{ $bab3->uraian4 }}</pre>
                            </li>
                            <li>Implikasi KLHS bagi pelayanan Perangkat Daerah
                                <pre style="color: rgb(244, 11, 11);">{{ $bab3->uraian5 }}</pre>
                            </li>
                        </ol>
                        <p class="indent">Sehingga teridentifikasi isu-isu strategis, dan hasil penentuan isu strategis
                            dengan metode USG (Urgency, Seriousness dan Growth), maka isu strategis dinas/badan <span
                                style="color: rgb(11, 242, 11);">{{ $selectedOpd['nama_opd'] ?? 'N/A' }}</span> Yang akan
                            ditangani dalam renstra selama {{ $bab3->lama_periode ?? 'N/A' }} tahun dan prioritas
                            penanganannya pada tahun rencana adalah:</p>
                        <table>
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Bidang Urusan</th>
                                    <th>Isu Strategis</th>
                                    <th>Permasalahan</th>
                                    <th>Nama Data Dukung</th>
                                    <th>Narasi Data Dukung</th> <!-- Kolom Tahun ditambahkan di sini -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>A</td>
                                    <td>b</td>
                                    <td>c</td>
                                    <td>d</td>
                                    <td>e</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="indent">
                            <span style="color: rgb(250, 5, 5);">{!! $bab3->uraian !!}</span>
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
