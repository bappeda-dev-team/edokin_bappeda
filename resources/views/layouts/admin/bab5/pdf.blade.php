<!DOCTYPE html>
<html>
<head>
    <title>Download BAB V</title>
    <style>
        body {
            font-family: Georgia, 'Times New Roman', Times, serif;
            line-height: 1.5;
            margin: 20px;
        }
        .section {
            margin: 20px 0;
        }
        .section h1 {
            font-size: 20px;
            margin-bottom: 10px;
            text-align: center;
        }
        .section h2 {
            font-size: 12px;
            margin-bottom: 8px;
            text-align: center;
        }
        .section p {
            margin: 10px 0;
            text-align: justify;
        }
        .list {
            margin: 10px 0;
        }
        .list ul, .list ol {
            margin-left: 20px;
            text-align: justify;
        }
        .list ul {
            list-style-type: disc;
        }
        .list ul ul {
            list-style-type: circle;
        }
        .list ol {
            list-style-type: lower-alpha;
        }
        .indent {
            text-indent: 48px; /* Indentation for the first line of each paragraph */
        }
        .indent1 {
            text-indent: 90px; /* More indentation if needed */
        }
        .center {
            text-align: center;
        }
        .nested-list {
            margin-left: 45px; /* Indentation for nested list items */
            list-style-type: none;
        }
        .nested-list li {
            text-indent: -30px;
            /* padding-left: 40px; */
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
</style>
</head>
<body>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div class="document-content">
                    <h1>BAB V</h1>
                    <h1>STRATEGI DAN ARAH KEBIJAKAN</h1><br>
            

                    <p class="indent">Dalam mencapai tujuan dan sasaran pada 
                        <span>{{$nama_opd}}</span> diperlukan strategi serta arah kebijakan dalam pencapaiannya dalam kurun waktu periodeisasi renstra. 
                        Rumusan tujuan dan sasaran, strategi dan arah kebijakan <span >{{$nama_opd}}</span> tertuang dalam tabel berikut :
                    </p>

                    <p style="text-align: center">Tabel 5.1.</p>
                    <p style="text-align: center">Tujuan, sasaran, Strategi, dan Arah Kebijakan</p>
                    <table >
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
                        <tr>
                            <td>
                                @if (is_array($tujuan_opd))
                                    @foreach ($tujuan_opd as $tujuan)
                                        <p>{{ $tujuan }}</p>
                                    @endforeach
                                @else
                                    <p>{{ $tujuan_opd }}</p>
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
                    

                    <p class="indent"><span>{!! $uraian !!}</span></p>
                </div>
            </div>
        </div>
    </div>
            
        </section>
        
</body>
</html>
