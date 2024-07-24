<!-- resources/views/bab1/pdf.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Detail BAB I</title>
    <style>
        /* Optional: Style your PDF content here */
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
    <p><strong>Latar Belakang:</strong> {!! $bab1->latar_belakang !!}</p>
    <p><strong>Dasar Hukum:</strong> {!! $bab1->dasar_hukum !!}</p>
    <p><strong>Maksud dan Tujuan:</strong> {!! $bab1->maksud_tujuan !!}</p>
    <p><strong>Sistematika Penulisan:</strong> {!! $bab1->sistematika_penulisan !!}</p>
</body>
</html>
