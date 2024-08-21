<!DOCTYPE html>
<html>
<head>
    <title>Download BAB II</title>
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
    
    
        .list-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px; /* Space between items */
        }
    
        .spacer {
            padding-right: 900px; /* Prevents the colon from shrinking */
        }
    </style>
</head>
<body>
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                {{-- <a href="{{ route('bab1.exportPdf', $bab1->id) }} "target="_blank">
                    <button class="btn btn-danger mb-3"><i class="fa fa-file-pdf"></i> Export to PDF </button>
                </a>
                <a href="{{ route('bab1.exportWord', $bab1->id) }}">
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
                                if (isset($urusan['bidang_urusan_opd']) && is_array($urusan['bidang_urusan_opd'])) {
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

                    <p class="indent">{{ $selectedOpd['nama_opd'] ?? 'N/A' }} mengelola bidang urusan {{ $bidangUrusanText }} 
                        yang telah dibentuk sesuai Peraturan Daerah Kota Madiun Nomor 3 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah sebagaimana telah diubah terakhir dengan Peraturan Daerah Kota Madiun Nomor 8 Tahun 2020.</p>
                </p>
                </ol>
                <p class="indent">Tugas {{ $selectedOpd['nama_opd'] ?? 'N/A' }} Dengan rincian tugas :</p>
                    <div class="list">
                        <ol style="list-style-type: none">
                            <ul style="list-style-type: none; padding-left: 0;">
                                <li class="list-item">
                                    Kepala <span class="spacer">:</span>
                                </li>
                                <li class="list-item">
                                    Sekretaris <span class="spacer">:</span>
                                </li>
                                <li class="list-item">
                                    Sub Bagian Keuangan <span class="spacer">:</span>
                                </li>
                                <li class="list-item">
                                    Sub Bagian Kepegawaian <span class="spacer">:</span>
                                </li>
                            </ul>
                        </ol>
                    </div>
                    <p class="indent">Fungsi {{ $selectedOpd['nama_opd'] ?? 'N/A' }} Dengan rincian tugas :</p>
                    <div class="list">
                        <ol style="list-style-type: none">
                            <ul style="list-style-type: none; padding-left: 0;">
                                <li class="list-item">
                                    Kepala <span class="spacer">:</span>
                                </li>
                                <li class="list-item">
                                    Sekretaris <span class="spacer">:</span>
                                </li>
                                <li class="list-item">
                                    Sub Bagian Keuangan <span class="spacer">:</span>
                                </li>
                                <li class="list-item">
                                    Sub Bagian Kepegawaian <span class="spacer">:</span>
                                </li>
                            </ul>
                        </ol>
                    </div>
                    <h4>2.2 Sumber Daya Perangkat Daerah</h4>
                    <p class="indent">{{ $selectedOpd['nama_opd'] ?? 'N/A' }}
                        memiliki sumber daya manusia yang bertugas dalam pengembangan organisasi dengan rincian personil sebagai berikut:
                    </p>
                    <p style="text-align: center">Tabel 2.1</p>
                        <p style="text-align: center">Sumber Daya Manusia Perangkat Daerah
                            Kota Madiun
                            </p>
                           
                           
                            
                            
                         
                          
                        {{-- <ol>
                            @if(isset($selectedOpd['bidang_urusan']) && is_array($selectedOpd['bidang_urusan']))
                                @foreach($selectedOpd['bidang_urusan'] as $urusan)
                                    <li>{{ $urusan['urusan'] ?? 'N/A' }}</li>
                                    <p>{{ $bab1->nama_bab ?? 'N/A' }}</p>
                                @endforeach
                            @else
                                <li>No data available</li>
                            @endif
                        </ol> --}}
                       
                        {{-- <ol>
                            @if(isset($selectedOpd['urusan_opd']) && is_array($selectedOpd['urusan_opd']))
                                @foreach($selectedOpd['urusan_opd'] as $urusan)
                                    @if(isset($urusan['bidang_urusan_opd']) && is_array($urusan['bidang_urusan_opd']) && count($urusan['bidang_urusan_opd']) > 0)
                                        @foreach($urusan['bidang_urusan_opd'] as $bidang)
                                            <li>{{ $bidang['bidang_urusan'] ?? 'N/A' }}</li>
                                        @endforeach
                                    @endif
                                @endforeach
                            @else
                                <li>No data available</li>
                            @endif
                        </ol> --}}
                        {{-- <ol>
                            @if (isset($selectedOpd['urusan_opd']) && is_array($selectedOpd['urusan_opd']) && count($selectedOpd['urusan_opd']) > 0)
                                @foreach ($selectedOpd['urusan_opd'] as $urusan)
                                    @if (isset($urusan['bidang_urusan_opd']) && is_array($urusan['bidang_urusan_opd']) && count($urusan['bidang_urusan_opd']) > 0)
                                        @foreach ($urusan['bidang_urusan_opd'] as $index => $bidang)
                                            @if ($index == 0)
                                                <li>
                                                    {{ $bidang['bidang_urusan'] ?? 'N/A' }}
                                               
                                                    @if (isset($bidang1))
                                                        - {{ $bidang1 }}
                                                    @endif
                                                </li>
                                            @elseif ($index == 1)
                                                <li>
                                                    {{ $bidang['bidang_urusan'] ?? 'N/A' }}
                                                  
                                                    @if (isset($bidang2))
                                                        - {{ $bidang2 }}
                                                    @endif
                                                </li>
                                            @else
                                                <li>{{ $bidang['bidang_urusan'] ?? 'N/A' }}</li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @else
                                <li>No data available</li>
                            @endif
                        </ol>
                         --}}
    
                        

                        {{-- <p class="indent">Rencana Strategis Perangkat Daerah Tahun 2024-2026 yang disusun telah selaras dengan Rencana Pembangunan Daerah (RPD) Tahun 2026-2026. 
                            Renstra PD merupakan potret dari Rencana strategis dari masing-masing Perangkat Daerah selama 2 (dua) tahun yang telah disusun melalui 
                            berbagai tahapan dan telah melibatkan unsur masyarakat dan stakeholder, Renstra PD yang disusun juga telah mengakomodir dokumen perencanaan Kementerian/Lembaga sebagai bagian dari kewenangan 
                                serta tugas dan pokok dan fungsi serta kewenangan Perangkat Daerah. Renstra PD akan menjadi dasar acuan penyusunan rencana kerja tahunan Perangkat Daerah.</p>
                        <br>
                        <h4>1.2. Dasar Hukum Penyusunan</h4>
                        <p class="indent">Dalam penyusunan renstra {{ $selectedOpd['nama_opd'] ?? 'N/A' }} Kota Madiun Tahun 2025-2026, peraturan yang digunakan sebagai landasan hukum adalah : </p>
                        <ol style="list-style-type: lower-alpha">
                            <li>dsfg</li>
                        </ol>
                        <h4>1.3. Maksud dan Tujuan</h4>
                        <p class="indent">Maksud disusunnya Rencana Strategis Perangkat Daerah adalah :</p>
                        <ol>
                            <li>Memberikan gambaran kinerja Perangkat Daerah pada renstra tahun sebelumnya yaitu renstra tahun 2019-2024;</li>
                            <li>Memberikan gambaran rencana strategis Perangkat Daerah pada Tahun 2025-2026;</li>
                            <li>sebagai pedoman Perangkat Daerah dalam menyusun kebijakan program, kegiatan, sub kegiatan serta tolok ukur dari kinerja penyelenggaraan pemerintahan daerah selama tahun 2025-2026.</li>
                        </ol>
                        <p class="indent">Tujuan disusunnya Rencana Kerja Perangkat Daerah adalah </p>
                        <ol>
                            <li>sebagai acuan pelaksanaan program, kegiatan dan sub kegiatan, serta sebagai pedoman penyusunan Rencana Kerja (Renja) Perangkat Daerah yang mengedepankan pelaksanaan akuntabilitas kinerja dalam mencapai tujuan pembangunan.</li>
                            <li>Tersedianya dokumen perencanaan tahunan yang disusun sebagai dasar Perengkat Daerah menyusun Renja Perangkat Daerah pada Tahun 2025 dan Tahun 2026.</li>
                        </ol>
                        <h4>1.4. Sistematika Penulisan</h4>
                        <p class="indent">Dengan berpedoman pada Peraturan Menteri Dalam Negeri Republik Indonesia Nomor 86 Tahun 2017 sistematika penyusunan Rencana Strategis Perangkat Daerah (Renstra PD) sebagai berikut :</p>
                        <p class="indent">Penetapan Renstra Oleh Kepala Perangkat Daerah</p>
                        <p class="indent">Daftar Isi</p>

                        <p class="indent">BAB I&emsp;: Pendahuluan</p>
                        <li class="indent1" style=" list-style-type: none;">&emsp;1.1. Latar Belakang</li>
                        <li class="indent1" style=" list-style-type: none;">&emsp;1.2. Dasar Hukum Penyusunan</li>
                        <li class="indent1" style=" list-style-type: none;">&emsp;1.3. Maksud dan Tujuan</li>
                        <li class="indent1" style=" list-style-type: none;">&emsp;1.4. Sistematika Penilaian</li>

                        <p class="indent">BAB II&emsp;: Gambaran Pelayanan Perangkat Daerah</p>
                        <li class="indent1" style=" list-style-type: none;">&emsp;2.1. Tugas, Fungsi, dan Struktur Perangkat Daerah</li>
                        <li class="indent1" style=" list-style-type: none;">&emsp;2.2. Sumber Daya Perangkat Daerah</li>
                        <li class="indent1" style=" list-style-type: none;">&emsp;2.3. Kinerja Pelayanan Perangkat Daerah</li>
                        <li class="indent1" style=" list-style-type: none;">&emsp;2.4. Kelompok Sasaran</li>


                        <p class="indent">BAB III&emsp;: Permasalahan dan Isu Strategis Perangkat Daerah</p>
                        <li class="indent1" style=" list-style-type: none;">&emsp;3.1. Permasalahan Pelayanan Perangkat Daerah</li>
                        <li class="indent1" style=" list-style-type: none;">&emsp;3.2. Isu Strategis</li>
                
                        <p class="indent">BAB IV&emsp;: Tujuan dan Sasaran Jangka Menengah Perangkat Daerah</p>
                        <li class="indent1" style=" list-style-type: none;">&emsp;4.1. Tujuan dan Sasaran Renstra PD Tahun 2025-2026</li>
                        <li class="indent1" style=" list-style-type: none;">&emsp;4.2. Cascading Kinerja PD</li>
                
                        <p class="indent">BAB V&emsp;: Strategi dan Arah Kebijakan</p>

                        <p class="indent">BAB VI&emsp;: Rencana Program, Kegiatan, dan Sub Kegiatan serta Pendanaan</p>
                 
                        <p class="indent">BAB VII&emsp;: Kinerja Penyelanggaraan Bidang Urusan</p>
                        <li class="indent1" style=" list-style-type: none;">&emsp;7.1. Penentuan target keberhasilan pencapaian tujuan dan sasaran Renstra PD Tahun 2025-2026 melalui Indikator Kinerja Utama (IKU) PD</li>
                        <li class="indent1" style=" list-style-type: none;">&emsp;7.2. Penentuan target kinerja penyelenggaraan urusan pemerintahan daerah Tahun 2025-2026 melalui Indikator Kinerja Kunci (IKK) PD</li>

                        <p class="indent">BAB VIII&emsp;: Penutup</p>
                     --}}
                        
                                          
                
                            
                    </div>
                </div>
            </section>
        </body>
        </html>
