@extends('layouts.admin.main')

@section('title', 'Detail BAB I')

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
</style>

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail BAB I</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <a href="{{ route('layouts.admin.bab1.index') }}">
                    <button class="btn btn-primary mb-3"><i class="fa fa-arrow-left"></i> Back </button>
                </a>
                <a href="{{ route('bab1.exportPdf', $bab1->id) }} "target="_blank">
                    <button class="btn btn-danger mb-3"><i class="fa fa-file-pdf"></i> Export to PDF </button>
                </a>
                <a href="{{ route('bab1.exportWord', $bab1->id) }}">
                    <button class="btn btn-success mb-3"><i class="fa fa-file-word"></i> Export to Word </button>
                </a>
                
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
                        <ol>
                            @if (isset($selectedOpd['urusan_opd']) && is_array($selectedOpd['urusan_opd']) && count($selectedOpd['urusan_opd']) > 0)
                                @foreach ($selectedOpd['urusan_opd'] as $urusan)
                                    @if (isset($urusan['bidang_urusan_opd']) && is_array($urusan['bidang_urusan_opd']) && count($urusan['bidang_urusan_opd']) > 0)
                                        @foreach ($urusan['bidang_urusan_opd'] as $index => $bidang)
                                            @if ($index == 0)
                                                <li>
                                                    {{ $bidang['bidang_urusan'] ?? 'N/A' }}
                                                    {{-- Tambahkan data dari bidang1 --}}
                                                    @if (isset($bidang1))
                                                        - {{ $bidang1 }}
                                                    @endif
                                                </li>
                                            @elseif ($index == 1)
                                                <li>
                                                    {{ $bidang['bidang_urusan'] ?? 'N/A' }}
                                                    {{-- Tambahkan data dari bidang2 --}}
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
