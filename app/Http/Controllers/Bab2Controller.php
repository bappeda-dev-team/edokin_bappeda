<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;

use App\Models\Bab2;
use App\Models\Jenis;
use App\Models\TahunDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Html;

class Bab2Controller extends Controller
{


    public function index()
    {
        $bab2 = Bab2::with('jenis')->get();
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        if ($response->successful()) {
            $urusan_opd = $response->json()['results'] ?? [];
        } else {
            $urusan_opd = [];
        }

        return view('layouts.admin.bab2.index', compact('bab2', 'jenis', 'urusan_opd', 'tahun'));
    }




    public function create()
    {
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        $urusan_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];

        return view('layouts.admin.bab2.create', compact('jenis', 'urusan_opd', 'tahun'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bab' => 'required',
            'jenis_id' => 'required',
            'nama_opd' => 'required',
            'bidang_urusan_1' => 'nullable|string',
            'bidang_urusan_2' => 'nullable|string',
            'bidang_urusan_3' => 'nullable|string',
            'kode_opd' => 'required|string',
            // 'kode_bidang_urusan'=>'required|string',
            'tahun_id' => 'required',
            'uraian' => 'nullable|string',
            // 'latar_belakang' => 'required',
            // 'maksud_tujuan' => 'required',
            // 'sistematika_penulisan' => 'required',
        ]);

        $bidangUrusan = trim($request->bidang_urusan_1);
        if (!empty($request->bidang_urusan_2)) {
            $bidangUrusan .= "\n" . trim($request->bidang_urusan_2); // Adding a line break between the two fields
        }

        if (!empty($request->bidang_urusan_3)) {
            $bidangUrusan .= "\n" . trim($request->bidang_urusan_3);
        }

        // Bab1::create($request->all());
        Bab2::create(array_merge($request->all(), ['bidang_urusan' => $bidangUrusan]));

        return redirect()->route('layouts.admin.bab2.index')->with('success', 'BAB 2 created successfully');
    }

    public function edit($id)
    {
        $bab2 = Bab2::findOrFail($id);
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        $urusan_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];

        return view('layouts.admin.bab2.edit', compact('bab2', 'jenis', 'urusan_opd', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bab' => 'required|string|max:255',
            'jenis_id' => 'required|exists:jenis,id',
            'nama_opd' => 'required|string',
            'bidang_urusan' => 'required|string',
            'kode_opd' => 'required|string',
            'tahun_id' => 'required|exists:tahun_dokumen,id',
            'uraian' => 'nullable|string',
            // 'kode_bidang_urusan'=>'required|string',
            // 'latar_belakang' => 'required|string',
            // 'maksud_tujuan' => 'required|string',
            // 'sistematika_penulisan' => 'required|string',
        ]);

        $bab2 = Bab2::findOrFail($id);

        $bab2->update($request->all());

        return redirect()->route('layouts.admin.bab2.index')->with('success', 'BAB 2 updated successfully');
    }

    public function destroy($id)
    {
        $bab2 = Bab2::findOrFail($id);
        $bab2->delete();

        return redirect()->route('layouts.admin.bab2.index')->with('success', 'BAB 2 deleted successfully');
    }




    public function show($id)
    {
        $bab2 = Bab2::with('jenis')->findOrFail($id);
        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';

        // Use GET if POST is not required
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        if (!$response->successful()) {
            abort(500, 'Failed to fetch data from API');
        }

        $urusan_opd = $response->json()['results'] ?? [];
        $selectedOpd = collect($urusan_opd)->firstWhere('kode_opd', $bab2->kode_opd);

        $selectedBidangUrusan = [];
        if ($selectedOpd) {
            $kodeBidangUrusan = is_array($bab2->kode_bidang_urusan) ? $bab2->kode_bidang_urusan : [$bab2->kode_bidang_urusan];

            foreach ($selectedOpd['bidang_urusan'] ?? [] as $bidang) {
                if (in_array($bidang['kode_bidang_urusan'] ?? '', $kodeBidangUrusan)) {
                    $selectedBidangUrusan[] = $bidang;
                }
            }
        }

        $asetList = $this->getAsets($bab2->kode_opd, $bab2->tahun);
        $SDMList = $this->getSumberDayaManusia($bab2->kode_opd, $bab2->tahun);

        return view('layouts.admin.bab2.show', [
            'bab2' => $bab2,
            'urusan_opd' => $urusan_opd,
            'selectedBidangUrusan' => $selectedBidangUrusan,
            'asets' => $asetList,
            'sumber_daya_manusia' => $SDMList
        ]);
    }

    public function exportPdf($id)
    {
        try {
            // Fetch the Bab1 record
            $bab2 = Bab2::findOrFail($id);

            // API URL and fetching data
            $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
            $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

            if (!$response->successful()) {
                throw new \Exception('Failed to fetch data from API');
            }

            // Parse API response
            $urusan_opd = $response->json()['results'] ?? [];

            // Render HTML view
            $html = view('layouts.admin.bab2.pdf', compact('bab2', 'urusan_opd'))->render();

            // Initialize MPDF
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                // Custom F4 (HVS) paper size: 210mm x 330mm
                'format' => [210, 330],
                'orientation' => 'P',
                'tempDir' => storage_path('app/temp'),
                'margin_left' => 25, // Tambahkan margin kiri untuk penjilidan
                'margin_right' => 15, // Margin kanan standar
                'margin_top' => 20, // Margin atas
                'margin_bottom' => 20, // Margin bawah
            ]);

            $mpdf->SetHTMLFooter('
                <div style="font-size: 10pt; border-top: 1px solid #000; padding-top: 5px; text-align: left;">
                    Renstra Elektronik Pemerintah Kota Madiun
                </div>
            ');

            // Write HTML to PDF
            $mpdf->WriteHTML($html);
            $fileName = 'bab2-' . $id . '.pdf';

            // Return PDF response
            return $mpdf->Output($fileName, 'I');
        } catch (\Exception $e) {
            // Log error and return JSON response
            \Log::error('PDF generation error: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate PDF: ' . $e->getMessage()], 500);
        }
    }

    public function getAsets($kode_opd, $tahun)
    {
        $apiUrl = 'https://kak.madiunkota.go.id/api/substansi_renstra/asets?tahun=' . $tahun . '&kode_opd=' . $kode_opd;

        $response = Http::timeout(30)
            ->withHeaders(['Accept' => 'application/json'])
            ->get($apiUrl);

        if (!$response->successful()) {
            Log::error('API request failed: ' . $response->status());
            return []; // Return an empty array if the request fails
        }

        $data = $response->json();

        if (empty($data)) {
            return []; // Return an empty array if no data found
        }

        $asetss = collect($data['asets'] ?? []);

        if ($asetss->isEmpty()) {
            return []; // Return an empty array if no assets found
        }

        return $asetss->map(function ($aset) {
            return [
                'aset' => $aset['aset'] ?? 'Unknown',
                'jumlah_aset' => $aset['jumlah_aset'] ?? 0,
                'satuan_aset' => $aset['satuan_aset'] ?? 'Unit',
                'kondisi' => $aset['kondisi'] ?? [],
                'tahun_perolehan_aset' => $aset['tahun_perolehan_aset'] ?? [],
                'keterangan' => $aset['keterangan'] ?? '',
            ];
        })->values(); // Return the list of assets
    }

    public function getSumberDayaManusia($kode_opd, $tahun)
    {
        $apiUrl = 'https://kak.madiunkota.go.id/api/substansi_renstra/sumber_daya_manusia?tahun=' . $tahun . '&kode_opd=' . $kode_opd;
        $tahun = '2024';
        $response = Http::timeout(30)
            ->withHeaders(['Accept' => 'application/json'])
            ->get($apiUrl);

        if (!$response->successful()) {
            Log::error('API request failed: ' . $response->status());
            return []; // Return an empty array if the request fails
        }

        $data = $response->json();
        // dd($data); 

        if (empty($data)) {
            return []; // Return an empty array if no data found
        }

        $sdm = collect($data['sumber_daya_manusia'] ?? []);
        if ($sdm->isEmpty()) {
            return []; // Return an empty array if no assets found
        }

        return $sdm->map(function ($jabatan) {
            return [
                'nama_jabatan' => $jabatan['nama_jabatan'] ?? 'Unknown',
                'status_jumlah_kepegawaian' => $jabatan['status_jumlah_kepegawaian'] ?? [],
                'pendidikan_terakhir' => $jabatan['pendidikan_terakhir'] ?? [],
            ];
        })->values();
    }


    // public function exportWord($id)
    // {
    //     try {
    //         // Fetch the Bab2 record
    //         $bab2 = Bab2::findOrFail($id);

    //         // API URL and fetching data
    //         $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
    //         $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

    //         if (!$response->successful()) {
    //             throw new \Exception('Failed to fetch data from API');
    //         }

    //         // Parse API response
    //         $urusan_opd = $response->json()['results'] ?? [];

    //         // Render HTML view
    //         $html = view('layouts.admin.bab2.word', compact('bab2', 'urusan_opd'))->render();

    //         // Initialize PhpWord
    //         $phpWord = new PhpWord();

    //         // Add a section to the Word document
    //         $section = $phpWord->addSection();

    //         // Convert HTML to plain text for Word document
    //         $text = strip_tags($html); // You may need more complex parsing here based on your needs

    //         // Add text to the section
    //         $section->addText($text);

    //         // Save the Word document
    //         $fileName = 'bab2-' . $id . '.docx';
    //         $tempFile = storage_path('app/' . $fileName);
    //         $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    //         $objWriter->save($tempFile);

    //         // Return Word document response
    //         return response()->download($tempFile)->deleteFileAfterSend(true);

    //     } catch (\Exception $e) {
    //         // Log error and return JSON response
    //         \Log::error('Word generation error: ' . $e->getMessage());
    //         return response()->json(['error' => 'Unable to generate Word document: ' . $e->getMessage()], 500);
    //     }
    // }
    public function exportWord($id)
    {
        $bab2 = Bab2::findOrFail($id);

        // API URL and fetching data
        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);
        $urusan_opd = $response->json();

        // Debug API response
        // dd($urusan_opd);

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();

        // Render HTML from Blade view
        $htmlContent = view('layouts.admin.bab2.word', compact('bab2', 'urusan_opd'))->render();

        // Simplify HTML and handle unsupported tags
        $allowedTags = '<p><h2><h2><h3><h4><h5><h6><ul><ol><li><b><i><u><strong><em>';
        $htmlContent = strip_tags($htmlContent, $allowedTags);

        // Convert HTML to Word format
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $htmlContent, false, false);

        // Save the Word file
        $fileName = 'Bab_I_Pendahuluan.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);

        $writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function getUrusanOpd($kode_opd)
    {
        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::timeout(30)->withHeaders(['Accept' => 'application/json'])
            ->post($apiUrl, ['kode_opd' => $kode_opd]);

        if (!$response->successful()) {
            return response()->json(['error' => 'Failed to fetch data from API'], 500);
        }

        $data = $response->json();
        $urusan_opd = collect($data['results'] ?? []);
        $opd = $urusan_opd->firstWhere('kode_opd', $kode_opd);

        if (!$opd) {
            return response()->json(['error' => 'OPD not found'], 404);
        }

        // Extract bidang_urusan from the nested structure
        $bidang_urusan = '';
        if (isset($opd['urusan_opd']) && is_array($opd['urusan_opd'])) {
            foreach ($opd['urusan_opd'] as $urusan) {
                if (isset($urusan['bidang_urusan_opd']) && is_array($urusan['bidang_urusan_opd'])) {
                    foreach ($urusan['bidang_urusan_opd'] as $bidang) {
                        $bidang_urusan .= $bidang['bidang_urusan'] . "\n"; // Append each bidang_urusan with a newline
                    }
                }
            }
        }

        return response()->json([
            'nama_opd' => $opd['nama_opd'] ?? null,
            'bidang_urusan' => trim($bidang_urusan), // Trim to remove trailing newline
        ]);
    }
}
    
        // public function getBidangUrusan($kode_bidang_urusan)
        // {
        //     $apiUrl = 'https://kak.madiunkota.go.id/api/bidang_urusan'; // Use the appropriate endpoint
        //     $response = Http::withHeaders(['Accept' => 'application/json'])
        //                     ->post($apiUrl, ['kode_bidang_urusan' => $kode_bidang_urusan]);

        //     // Check if the response was successful
        //     if (!$response->successful()) {
        //         Log::error('Failed to fetch Bidang Urusan data from API', [
        //             'status' => $response->status(),
        //             'response' => $response->body()
        //         ]);
        //         return response()->json(['error' => 'Failed to fetch data from API'], 500);
        //     }

        //     $data = $response->json();

        //     // Check if data is present
        //     if (empty($data['result'])) {
        //         return response()->json(['error' => 'Bidang Urusan not found'], 404);
        //     }

        //     // Return the JSON response
        //     return response()->json([
        //         'bidang_urusan' => $data['result']['bidang_urusan'] ?? null,
        //     ]);
        // }
        // public function getUrusanOpd($kode_opd)
        // {
        //     $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        //     $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);
        
        //     if (!$response->successful()) {
        //         return response()->json(['error' => 'Failed to fetch data from API'], 500);
        //     }
        
        //     $urusan_opd = collect($response->json()['results'] ?? []);
        //     $opd = $urusan_opd->firstWhere('kode_opd', $kode_opd);
        
        //     if (!$opd) {
        //         return response()->json(['error' => 'OPD not found'], 404);
        //     }
        
        //     // Prepare data to be returned
        //     return response()->json([
        //         'nama_opd' => $opd['nama_opd'] ?? null,
        //         'bidang_urusan' => $opd['bidang_urusan'] ?? [], // Ensure this is an array
        //     ]);
        // }
        
        // public function getNamaBidangUrusan($kode_bidang_urusan)
        // {
        //     $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        //     $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);
        
        //     if (!$response->successful()) {
        //         return response()->json(['error' => 'Failed to fetch data from API'], 500);
        //     }
        
        //     $data = $response->json();
        //     $urusan_opd = collect($data['results'] ?? []);
        //     $bidang_urusan = $urusan_opd->flatMap(function($opd) {
        //         return collect($opd['bidang_urusan'] ?? []);
        //     })->firstWhere('kode_bidang_urusan', $kode_bidang_urusan);
        
        //     if (!$bidang_urusan) {
        //         return response()->json(['error' => 'Bidang urusan not found'], 404);
        //     }
        
        //     return response()->json(['bidang_urusan' => $bidang_urusan['nama_bidang_urusan'] ?? null]);
        // }
        
        
        

        



//     public function exportWord($id)
//     {
//         try {
//             // Fetch the data
//             $bab2 = Bab2::findOrFail($id);
    
//             // Fetch OPD data
//             $apiUrl = 'https://kak.madiunkota.go.id/api/opd/daftar_opd';
//             $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);
//             $data_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];
    
//             // Render the view with the data
//             $html = view('layouts.admin.bab2.word', compact('bab2', 'data_opd'))->render();
    
//             // Initialize PhpWord
//             $phpWord = new PhpWord();
//             $section = $phpWord->addSection();
    
//             // Sanitize HTML
//             $html = $this->sanitizeHtml($html);
    
//             // Add HTML content to the section
//             try {
//                 \PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, true);
//             } catch (\Exception $e) {
//                 \Log::error('PHPWord HTML parsing error: ' . $e->getMessage());
//                 return response()->json(['error' => 'Unable to parse HTML for Word document: ' . $e->getMessage()], 500);
//             }
    
//             // Save and output the Word document
//             $fileName = 'bab2-' . $id . '.docx';
//             $tempFile = tempnam(sys_get_temp_dir(), 'word');
//             $phpWord->save($tempFile, 'Word2007');
    
//             return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    
//         } catch (\Exception $e) {
//             // Handle any other errors
//             \Log::error('Word export error: ' . $e->getMessage());
//             return response()->json(['error' => 'Unable to generate Word document: ' . $e->getMessage()], 500);
//         }
//     }
// }    