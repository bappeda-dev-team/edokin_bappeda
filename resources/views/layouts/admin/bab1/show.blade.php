@extends('layouts.admin.main')

@section('title', 'Detail BAB I')

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
                <a href="{{ route('bab1.exportPdf', $bab1->id) }}">
                    <button class="btn btn-danger mb-3"><i class="fa fa-file-pdf"></i> Export to PDF </button>
                </a>
                <a href="{{ route('bab1.exportWord', $bab1->id) }}">
                    <button class="btn btn-success mb-3"><i class="fa fa-file-word"></i> Export to Word </button>
                </a>
                
                <div class="document-content">
                    {{-- Menampilkan data dengan format yang sesuai --}}
                    <p>{!! $bab1->latar_belakang !!}</p>
                    <p>{!! $bab1->dasar_hukum !!}</p>
                    <p>{!! $bab1->maksud_tujuan !!}</p>
                    <p>{!! $bab1->sistematika_penulisan !!}</p>
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
