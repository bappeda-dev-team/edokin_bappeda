@extends('layouts.admin.main')

@section('title', 'Detail BAB V')



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

        th,
        td {
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
            <h1>Detail BAB V</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <a href="{{ route('layouts.admin.bab5.index') }}">
                        <button class="btn btn-primary mb-3"><i class="fa fa-arrow-left"></i> Back </button>
                    </a>
                    <a href="{{ route('bab5.exportPdf', $bab5->id) }} "target="_blank">
                        <button class="btn btn-danger mb-3"><i class="fa fa-file-pdf"></i> Export to PDF </button>
                    </a>

                    <div class="document-content">
                        <h1>BAB V</h1>
                        <h1>STRATEGI DAN ARAH KEBIJAKAN</h1><br>


                        <p class="indent">Dalam mencapai tujuan dan sasaran pada
                            <span style="color: rgb(11, 242, 11);">{{ $nama_opd }}</span> diperlukan strategi serta arah
                            kebijakan dalam pencapaiannya dalam kurun waktu periodeisasi renstra.
                            Rumusan tujuan dan sasaran, strategi dan arah kebijakan <span
                                style="color: rgb(11, 242, 11);">{{ $nama_opd }}</span> tertuang dalam tabel berikut :
                        </p>

                        <p style="text-align: center">Tabel 5.1.</p>
                        <p style="text-align: center">Tujuan, sasaran, Strategi, dan Arah Kebijakan</p>
                        <table>
                            <!-- VISI -->
                            <tr>
                                <th colspan="4">VISI:</th>
                            </tr>

                            <!-- MISI 1 -->
                            <tr>
                                <th colspan="4">MISI 1:</th>
                            </tr>
                            <tr>
                                <th>Tujuan</th>
                                <th>Sasaran</th>
                                <th>Strategi</th>
                                <th>Arah Kebijakan</th>
                            </tr>
                            {{-- @php
                                dd($tujuan_opd, $sasaran_opd_list, $strategi, $kebijakan_list);
                            @endphp --}}
                            <tr>
                                <td>
                                    @if (is_array($tujuan_opd))
                                        @foreach ($tujuan_opd as $tujuan)
                                            <div>{{ $tujuan }}</div>
                                        @endforeach
                                    @else
                                        <div>{{ $tujuan_opd }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if (is_array($sasaran_opd_list))
                                        @foreach ($sasaran_opd_list as $sasaran)
                                            <p>{{ $sasaran }}</p>
                                        @endforeach
                                    @else
                                        <p>{{ $sasaran_opd_list }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if (is_array($strategi))
                                        @foreach ($strategi as $strategii)
                                            <p>{{ $strategii }}</p>
                                        @endforeach
                                    @else
                                        <p>{{ $strategi }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if (is_array($kebijakan_list))
                                        @foreach ($kebijakan_list as $kebijakan)
                                            <p>{{ $kebijakan }}</p>
                                        @endforeach
                                    @else
                                        <p>{{ $kebijakan_list }}</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Tujuan 2</td>
                                <td>Sasaran 2.1</td>
                                <td>Strategi 1.2</td>
                                <td>Arah kebijakan 1.2</td>
                            </tr>
                            <!-- Add more rows as needed -->

                            <!-- MISI 2 -->
                            <tr>
                                <th colspan="4">MISI 2:</th>
                            </tr>
                            <tr>
                                <th>Tujuan</th>
                                <th>Sasaran</th>
                                <th>Strategi</th>
                                <th>Arah Kebijakan</th>
                            </tr>
                            <tr>
                                <td>Tujuan 1</td>
                                <td>Sasaran 1.1</td>
                                <td>Strategi 1.1</td>
                                <td>Arah kebijakan 1.1</td>
                            </tr>
                            <tr>
                                <td>Tujuan 2</td>
                                <td>Sasaran 2.1</td>
                                <td>Strategi 1.2</td>
                                <td>Arah kebijakan 1.2</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </table>


                        <p class="indent"><span style="color: rgb(255, 0, 0);">{!! $uraian !!}</span></p>



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
