<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;

use App\Models\Bab5;
use App\Models\Jenis;
use App\Models\TahunDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Html;

class Bab5Controller extends Controller
{

    
    public function index()
    {
        $bab5 = Bab5::with('jenis')->get();
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        if ($response->successful()) {
            $urusan_opd = $response->json()['results'] ?? [];
        } else {
            $urusan_opd = [];
        }

        return view('layouts.admin.bab5.index', compact('bab5', 'jenis', 'urusan_opd', 'tahun'));
    }

  


    public function create()
    {
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        $urusan_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];

        return view('layouts.admin.bab5.create', compact('jenis', 'urusan_opd', 'tahun'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bab' => 'required',
            'jenis_id' => 'required',
            'nama_opd' => 'required',
            
            
        ]);

        Bab1::create($request->all());

        return redirect()->route('layouts.admin.bab5.index')->with('success', 'BAB 5 created successfully');
    }

    public function edit($id)
    {
        $bab5 = Bab5::findOrFail($id);
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        $urusan_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];

        return view('layouts.admin.bab5.edit', compact('bab5', 'jenis', 'urusan_opd', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bab' => 'required|string|max:255',
            'jenis_id' => 'required|exists:jenis,id',
            'nama_opd' => 'required|string',
           
        ]);

        $bab5 = Bab5::findOrFail($id);

        $bab5->update($request->all());

        return redirect()->route('layouts.admin.bab5.index')->with('success', 'BAB 5 updated successfully');
    }

    public function destroy($id)
    {
        $bab5 = Bab5::findOrFail($id);
        $bab5->delete();

        return redirect()->route('layouts.admin.bab1.index')->with('success', 'BAB 1 deleted successfully');
    }

   
    public function show()
    {
        
        return view('layouts.admin.bab5.show');
    }
    

    
    public function exportPdf($id)
    {
        try {
            // Fetch the Bab5 record
            $bab5 = Bab5::findOrFail($id);
    
            // API URL and fetching data
            $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
            $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);
            
            if (!$response->successful()) {
                throw new \Exception('Failed to fetch data from API');
            }
    
            // Parse API response
            $urusan_opd = $response->json()['results'] ?? [];
    
            // Render HTML view
            $html = view('layouts.admin.bab5.pdf', compact('bab5', 'urusan_opd'))->render();
    
            // Initialize MPDF
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'tempDir' => storage_path('app/temp'),
            ]);
    
            // Write HTML to PDF
            $mpdf->WriteHTML($html);
            $fileName = 'bab5-' . $id . '.pdf';
    
            // Return PDF response
            return $mpdf->Output($fileName, 'I');
            
        } catch (\Exception $e) {
            // Log error and return JSON response
            \Log::error('PDF generation error: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate PDF: ' . $e->getMessage()], 500);
        }
    }

    

    // public function exportWord($id)
    // {
    //     try {
    //         // Fetch the Bab1 record
    //         $bab1 = Bab1::findOrFail($id);

    //         // API URL and fetching data
    //         $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
    //         $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

    //         if (!$response->successful()) {
    //             throw new \Exception('Failed to fetch data from API');
    //         }
    
    //         // Parse API response
    //         $urusan_opd = $response->json()['results'] ?? [];
    
    //         // Render HTML view
    //         $html = view('layouts.admin.bab1.word', compact('bab1', 'urusan_opd'))->render();
    
    //         // Initialize PhpWord
    //         $phpWord = new PhpWord();
    
    //         // Add a section to the Word document
    //         $section = $phpWord->addSection();
    
    //         // Convert HTML to plain text for Word document
    //         $text = strip_tags($html); // You may need more complex parsing here based on your needs
    
    //         // Add text to the section
    //         $section->addText($text);
    
    //         // Save the Word document
    //         $fileName = 'bab1-' . $id . '.docx';
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
    $bab5 = Bab5::findOrFail($id);

    // API URL and fetching data
    $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
    $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);
    $urusan_opd = $response->json();

    // Debug API response
    // dd($urusan_opd);

    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $section = $phpWord->addSection();

    // Render HTML from Blade view
    $htmlContent = view('layouts.admin.bab5.word', compact('bab5', 'urusan_opd'))->render();

    // Simplify HTML and handle unsupported tags
    $allowedTags = '<p><h1><h2><h3><h4><h5><h6><ul><ol><li><b><i><u><strong><em>';
    $htmlContent = strip_tags($htmlContent, $allowedTags);

    // Convert HTML to Word format
    \PhpOffice\PhpWord\Shared\Html::addHtml($section, $htmlContent, false, false);

    // Save the Word file
    $fileName = 'Bab_V_Strategi_dan_arah.docx';
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
//             $bab1 = Bab1::findOrFail($id);
    
//             // Fetch OPD data
//             $apiUrl = 'https://kak.madiunkota.go.id/api/opd/daftar_opd';
//             $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);
//             $data_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];
    
//             // Render the view with the data
//             $html = view('layouts.admin.bab1.word', compact('bab1', 'data_opd'))->render();
    
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
//             $fileName = 'bab1-' . $id . '.docx';
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