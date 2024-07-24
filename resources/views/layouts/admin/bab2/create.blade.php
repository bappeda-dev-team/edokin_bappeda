@extends('layouts.admin.main')

@section('title', 'Dashboard E-DOKIN')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>BAB 2</h4>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <h4>2.1 Tugas, Fungsi dan Struktur Organisasi Perangkat Daerah</h4>
                </div>
                <textarea name="latar_belakang" class="summernote"></textarea>
            </div>
            <div class="text-center">
                <h4>Bagan organisasi</h4>
            </div>
            <div class="tree">
                <ul>
                    <li>
                        <a href="#">[Text]</a>
                        <ul>
                            <li>
                                <a href="#">[Text]</a>
                                <!--<ul>-->
                                <!--    <li><a href="#">[Text]</a></li>-->
                                <!--    <li><a href="#">[Text]</a></li>-->
                                <!--</ul>-->
                            </li>
                            <li>
                                <a href="#">[Text]</a>
                                <!--<ul>-->
                                <!--    <li><a href="#">[Text]</a></li>-->
                                <!--</ul>-->
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            
            <div class="card-body">
                <div class="text-center">
                    <h4>2.2 Sumber Daya Perangkat Daerah</h4>
                </div>
                <textarea name="dasar_hukum" class="summernote"></textarea>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <h4>2.3 Kinerja Pelayanan Perangkat Daerah</h4>
                </div>
                <textarea name="maksud_tujuan" class="summernote"></textarea>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <h4>2.4 Kelompok Sasaran Layanan</h4>
                </div>
                <textarea name="sistematika_penulisan" class="summernote"></textarea>
            </div>
            <div class="form-group row mb-4">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-success btn-lg mx-2">Submit</button>
                    <a href="{{ route('layouts.admin.bab2.index') }}" class="btn btn-danger btn-lg mx-2">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .tree ul {
        padding-top: 20px; 
        position: relative;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    .tree li {
        float: left; 
        text-align: center;
        list-style-type: none;
        position: relative;
        padding: 20px 5px 0 5px;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    .tree li::before, .tree li::after {
        content: '';
        position: absolute; 
        top: 0; 
        right: 50%;
        border-top: 1px solid #ccc;
        width: 50%; 
        height: 20px;
    }

    .tree li::after {
        right: auto; 
        left: 50%;
        border-left: 1px solid #ccc;
    }

    .tree li:only-child::after, .tree li:only-child::before {
        display: none;
    }

    .tree li:only-child { 
        padding-top: 0;
    }

    .tree li:first-child::before, .tree li:last-child::after {
        border: 0 none;
    }

    .tree li:last-child::before {
        border-right: 1px solid #ccc;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
    }

    .tree li:first-child::after {
        border-radius: 5px 0 0 0;
        -webkit-border-radius: 5px 0 0 0;
        -moz-border-radius: 5px 0 0 0;
    }

    .tree ul ul::before {
        content: '';
        position: absolute; 
        top: 0; 
        left: 50%;
        border-left: 1px solid #ccc;
        width: 0; 
        height: 20px;
    }

    .tree li a {
        border: 1px solid #ccc;
        padding: 5px 10px;
        text-decoration: none;
        color: #666;
        font-family: arial, verdana, tahoma;
        font-size: 11px;
        display: inline-block;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    .tree li a:hover, .tree li a:hover + ul li a {
        background: #c8e4f8; 
        color: #000; 
        border: 1px solid #94a0b4;
    }

    .tree li a:hover + ul li::after, 
    .tree li a:hover + ul li::before, 
    .tree li a:hover + ul::before, 
    .tree li a:hover + ul ul::before {
        border-color:  #94a0b4;
    }
</style> 

@section('scripts')
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,   // set the height of the editor
            minHeight: null, // set minimum height of the editor
            maxHeight: null, // set maximum height of the editor
            focus: true     // set focus to editable area after initializing summernote
        });
    });
</script>
@endsection


@endsection
