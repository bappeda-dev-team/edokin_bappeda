<!-- resources/views/bab1/word.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Detail BAB I</title>
    <style>
        /* Optional: Style your Word content here */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Detail BAB I</h1>
    <div class="document-content">
        {{-- Menampilkan data dengan format yang sesuai --}}
        <p>{!! $bab1->latar_belakang !!}</p>
        <p>{!! $bab1->dasar_hukum !!}</p>
        <p>{!! $bab1->maksud_tujuan !!}</p>
        <p>{!! $bab1->sistematika_penulisan !!}</p>
    </div>
</body>
</html>
