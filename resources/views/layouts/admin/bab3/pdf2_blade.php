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
                        <table>
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Bidang Urusan</th>
                                    <th>Isu Strategis</th>
                                    <th>Permasalahan</th>
                                    <th>Nama Data Dukung</th>
                                    <th>Narasi Data Dukung</th> <!-- Kolom Tahun ditambahkan di sini -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>A</td>
                                    <td>b</td>
                                    <td>c</td>
                                    <td>d</td>
                                    <td>e</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="indent">
                            <span style="color: rgb(250, 5, 5);">{!! $bab3->uraian !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
