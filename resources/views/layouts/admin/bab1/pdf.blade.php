<!DOCTYPE html>
<html>
<head>
    <title>Download BAB I</title>
    <style>
        body {
            font-family: 'Times New Roman';
            line-height: 1.6;
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
        .list ul {
            list-style-type: disc;
            margin-left: 20px;
            text-align: justify;
        }
        .list ol {
            margin-left: 20px;
            text-align: justify;
        }
        .list ul ul {
            list-style-type: circle;
            text-align: justify;
        }
        .indent {
            text-indent: 48px; /* Indentation for the first line of each paragraph */
            margin-left: 20px;
        }
        .indent1 {
            text-indent: 90px; /* More indentation if needed */
            margin-left: 20px;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div class="document-content">
                        <h1>BAB I</h1>
                        <h1>PENDAHULUAN</h1>
                        <h4>1.1. Latar Belakang</h4>
                        <p class="indent">Rencana Strategis Perangkat Daerah (Renstra PD) merupakan dokumen perencanaan yang dibuat setiap 5 (lima) tahun sebagai tindaklanjut telah ditetapkannya dokumen 
                        Rencana Pembangunan Daerah (RPD) atau Rencana Pembangunan Jangka Menengah Daerah (RPJMD). Penyusunan Renstra PD tidak lepas dari peran stakeholder serta 
                        Masyarakat. Tahapan penyusunan Renstra PD tertuang dalam pasal 108 sampai dengan pasal 124 Peraturan Menteri Dalam Negeri Nomor 86 Tahun 2017, dimulai dari tahapan:</p>
                        <div class="list">
                            <ol style="list-style-type: lower-alpha">
                                <li>
                                    persiapan penyusunan renstra:
                                    <ul>
                                        <li>Menyusun rancangan keputusan Kepala Daerah tentang pembentukan tim penyusun Renstra Perangkat Daerah</li>
                                        <li>Orientasi mengenai Renstra Perangkat Daerah</li>
                                        <li>Penyusunan agenda kerja tim penyusun Renstra Perangkat Daerah</li>
                                        <li>Penyiapan data dan informasi perencanaan pembangunan Daerah berdasarkan SIPD</li>
                                    </ul>
                                </li>
                                <li>
                                    penyusunan rancangan awal renstra Perangkat Daerah:
                                    <ul>
                                        <li>Dilakukan bersamaan dengan penyusunan rancangan awal RPJMD/RPD, mencakup:</li>
                                        <ol style="list-style-type: lower-alpha">
                                            <li>analisis gambaran pelayanan</li>
                                            <li>analisis permasalahan</li>
                                            <li>penelaahan dokumen perencanaan lainnya</li>
                                            <li>analisis isu strategis</li>
                                            <li>merumusan tujuan dan sasaran Perangkat Daerah berdasarkan sasaran dan indikator serta target kinerja dalam rancangan RPJMD/RPD</li>
                                            <li>merumuskan strategi dan arah kebijakan Perangkat Daerah untuk mencapai tujuan dan sasaran serta target kinerja Perangkat Daerah</li>
                                            <li>merumuskan rencana program, kegiatan, indikator kinerja, pagu indikatif, lokasi kegiatan dan kelompok sasaran berdasarkan strategi dan kebijakan Perangkat Daerah</li>
                                        </ol>
                                    </ul>
                                </li>
                                <li>
                                    penyusunan rancangan renstra Perangkat Daerah.
                                    <ul>
                                        <li>Untuk penyempurnaan menunggu Surat Edaran Kepala Daerah tentang penyusunan rancangan Renstra Perangkat Daerah kepada Kepala Perangkat Daerah dengan lampiran rancangan awal RPJMD/RPD</li>
                                        <li>Rancangan awal Renstra untuk menjadi rancangan Renstra harus disempurnakan dengan berdasarkan hasil pelaksanaan Forum Renstra Perangkat Daerah yang dirumuskan dalam berita acara</li>
                                        <li>Penyampaian rancangan Renstra paling lambat 10 (sepuluh) hari setelah pelaksanaan forum perangkat daerah untuk dilakukan verifikasi oleh Bappeda.</li>
                                        <li>Verifikasi rancangan renstra perangkat daerah disampaikan paling lambat 2 (dua) minggu setelah penyampaian perangkat daerah kepada Bappeda.  </li>
                                    </ul>
                                </li>
                                <li>
                                    pelaksanaan forum perangkat daerah/ lintas perangkat daerah;
                                    <ul>
                                        <li>dilaksanakan paling lambat 2 minggu setelah Surat Edaran Penyempurnaan Rancangan Renstra Perangkat Daerah </li>
                                    </ul>
                                </li>
                                <li>
                                    perumusan rancangan akhir. dan
                                </li>
                                <li>
                                    penetapan
                                    <ul>
                                        <li>ditetapkan paling lambat 1 (satu) minggu setelah Peraturan Kepala Daerah tentang Peraturan Daerah tentang Rencana Pembangunan Jangka Menengah Daerah (RPJMD) ditetapkan </li>
                                    </ul>
                                </li>
                                <br>
                                @php
                                    $selectedOpd = null;
                                    foreach ($urusan_opd as $opd) {
                                        if ($opd['kode_opd'] == $bab1->kode_opd) {
                                            $selectedOpd = $opd;
                                            break;
                                        }
                                    }
                                @endphp
    
                                <p> {{ $selectedOpd['nama_opd'] ?? 'N/A' }} Kota Madiun mengelola urusan dan bidang urusan sebagai berikut :</p>
                            </ol>
                            <ol>
                                <li>urusan</li>
                            </ol>
                            <p class="indent">Rencana Strategis Perangkat Daerah Tahun 2024-2026 yang disusun telah selaras dengan Rencana Pembangunan Daerah (RPD) Tahun 2026-2026. 
                                Renstra PD merupakan potret dari Rencana strategis dari masing-masing Perangkat Daerah selama 2 (dua) tahun yang telah disusun melalui 
                                berbagai tahapan dan telah melibatkan unsur masyarakat dan stakeholder, Renstra PD yang disusun juga telah mengakomodir dokumen perencanaan Kementerian/Lembaga sebagai bagian dari kewenangan 
                                    serta tugas dan pokok dan fungsi serta kewenangan Perangkat Daerah. Renstra PD akan menjadi dasar acuan penyusunan rencana kerja tahunan Perangkat Daerah.</p>
                            <br>
                            <h4>1.2. Dasar Hukum Penyusunan</h4>
                            <p class="indent">Dalam penyusunan renstra {{ $selectedOpd['nama_opd'] ?? 'N/A' }} Kota Madiun Tahun 2025-2026, peraturan yang digunakan sebagai landasan hukum adalah : </p>
                            <ol style="list-style-type: lower-alpha">
                                <li>dsfg</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
