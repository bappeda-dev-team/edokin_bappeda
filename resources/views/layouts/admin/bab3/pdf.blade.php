<!DOCTYPE html>
<html>
<head>
    <title>Download BAB III</title>
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
                        <h1>BAB III</h1>
                        <h1>PERMASALAHAN DAN ISU STRATEGIS PERANGKAT DAERAH</h1><br>
                        <h4>3.1. Permasalahan Pelayanan Perangkat Daerah</h4>
                        @php
                            $selectedOpd = null;
                            foreach ($urusan_opd as $opd) {
                                if ($opd['kode_opd'] == $bab3->kode_opd) {
                                    $selectedOpd = $opd;
                                    break;
                                }
                            }
                        @endphp

                        <p class="indent">Dalam menentukan masalah pokok, masalah, dan akar masalah perlu disusun analisis pohon masalah sebagai bagian dari penentuan permasalahan yang riel dihadapi Perangkat Daerah dalam penyelenggaraan urusan pemerintahan. Sebagaimana analisis pohon masalah dapat disimpulkan permasalahan pada <span>{{ $selectedOpd['nama_opd'] ?? 'N/A' }}</span> adalah sebagai berikut:</p>

                        <p style="text-align: center">Tabel 3.1.</p>
                        <p style="text-align: center">Pemetaan Permasalahan untuk Penentuan Prioritas dan Sasaran Pembangunan Daerah</p>
                        <table>
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Masalah Pokok</th>
                                    <th>Masalah</th>
                                    <th>Akar Masalah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Masalah Pokok 1</td>
                                    <td>Masalah 1</td>
                                    <td>Akar Masalah 1</td>
                                </tr>
                                <!-- Tambahkan baris tambahan sesuai dengan data dari $bab3 jika diperlukan -->
                            </tbody>
                        </table>
                        
                        <p class="indent">Sebagaimana tabel di atas maka terdapat permasalahan-permasalahan pelayanan dan faktor-faktor yang mempengaruhi permasalahan tersebut yaitu:</p>

                        <h4>3.2. Isu Strategis</h4>
                        <p class="indent">Identifikasi hasil reviu faktor-faktor pelayanan perangkat daerah yang mempengaruhi permasalahan pelayanan perangkat daerah ditinjau dari:</p>
                        <ol>
                            <li>Gambaran pelayanan perangkat daerah <strong>{!! $bab3->uraian1 !!}</strong></li>
                            <li>Sasaran jangka menengah pada renstra Kementerian/Lembaga <strong>{!! $bab3->uraian2 !!}</strong></li>
                            <li>Sasaran jangka menengah dari renstra Perangkat Daerah provinsi <strong>{!! $bab3->uraian3 !!}</strong></li>
                            <li>Implikasi RTRW bagi pelayanan Perangkat Daerah <strong>{!! $bab3->uraian4 !!}</strong></li>
                            <li>Implikasi KLHS bagi pelayanan Perangkat Daerah <strong>{!! $bab3->uraian5 !!}</strong></li>
                        </ol>
                        <p class="indent">Sehingga teridentifikasi isu-isu strategis, dan hasil penentuan isu strategis dengan metode USG (Urgency, Seriousness dan Growth), maka isu strategis dinas/badan <span>{{ $selectedOpd['nama_opd'] ?? 'N/A' }}</span> yang akan ditangani dalam renstra selama ….. tahun dan prioritas penanganannya pada tahun rencana adalah:</p>    
                        <ol>
                            <li>{!! $bab3->isu_strategis1 !!}</li>
                            <li>{!! $bab3->isu_strategis2 !!}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
