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
    <p> {!! $bab1->latar_belakang !!}</p>
    <p> {!! $bab1->dasar_hukum !!}</p>
    <p> {!! $bab1->maksud_tujuan !!}</p>
    <p> {!! $bab1->sistematika_penulisan !!}</p>
</body>
</html>