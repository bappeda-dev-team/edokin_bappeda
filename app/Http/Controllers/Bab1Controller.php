<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;

use App\Models\Bab1;
use App\Models\Jenis;
use App\Models\TahunDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class Bab1Controller extends Controller
{

    
    public function index()
    {
        $bab1 = Bab1::with('jenis')->get();
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        $urusan_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];
        

        return view('layouts.admin.bab1.index', compact('bab1', 'jenis', 'urusan_opd', 'tahun'));
    }

  


    public function create()
    {
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        $urusan_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];

        return view('layouts.admin.bab1.create', compact('jenis', 'urusan_opd', 'tahun'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bab' => 'required',
            'jenis_id' => 'required',
            'nama_opd' => 'required',
            'bidang_urusan' => 'required',
            'bidang1'=>'required',
            'bidang2'=>'required',
            'kode_opd' => 'required|string',
            'tahun_id' => 'required',
            // 'latar_belakang' => 'required',
            'dasar_hukum' => 'required',
            // 'maksud_tujuan' => 'required',
            // 'sistematika_penulisan' => 'required',
        ]);

        Bab1::create($request->all());

        return redirect()->route('layouts.admin.bab1.index')->with('success', 'BAB 1 created successfully');
    }

    public function edit($id)
    {
        $bab1 = Bab1::findOrFail($id);
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        $urusan_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];

        return view('layouts.admin.bab1.edit', compact('bab1', 'jenis', 'urusan_opd', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bab' => 'required|string|max:255',
            'jenis_id' => 'required|exists:jenis,id',
            'nama_opd' => 'required|string',
            'bidang_urusan' => 'required|string',
            'bidang1'=> 'required|string',
            'bidang2'=> 'required|string',
            'kode_opd' => 'required|string',
            'tahun_id' => 'required|exists:tahun_dokumen,id',
            // 'latar_belakang' => 'required|string',
            'dasar_hukum' => 'required|string',
            // 'maksud_tujuan' => 'required|string',
            // 'sistematika_penulisan' => 'required|string',
        ]);

        $bab1 = Bab1::findOrFail($id);

        $bab1->update($request->all());

        return redirect()->route('layouts.admin.bab1.index')->with('success', 'BAB 1 updated successfully');
    }

    public function destroy($id)
    {
        $bab1 = Bab1::findOrFail($id);
        $bab1->delete();

        return redirect()->route('layouts.admin.bab1.index')->with('success', 'BAB 1 deleted successfully');
    }

    public function show($id)
    {
        $bab1 = Bab1::with('jenis')->findOrFail($id);
        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);
        $urusan_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];
    
        // Data tambahan untuk bidang1 dan bidang2
        // $bidang1 = $request->input('bidang1', 'Default info for bidang1');
        // $bidang2 = $request->input('bidang2', 'Default info for bidang2');
    
        return view('layouts.admin.bab1.show', compact('bab1', 'urusan_opd'));
    }
    
    public function exportPdf($id)
    {
        try {
            // Fetch the Bab1 record
            $bab1 = Bab1::findOrFail($id);
    
            // API URL and fetching data
            $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
            $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);
            
            if (!$response->successful()) {
                throw new \Exception('Failed to fetch data from API');
            }
    
            // Parse API response
            $urusan_opd = $response->json()['results'] ?? [];
    
            // Render HTML view
            $html = view('layouts.admin.bab1.pdf', compact('bab1', 'urusan_opd'))->render();
    
            // Initialize MPDF
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'tempDir' => storage_path('app/temp'),
            ]);
    
            // Write HTML to PDF
            $mpdf->WriteHTML($html);
            $fileName = 'bab1-' . $id . '.pdf';
    
            // Return PDF response
            return $mpdf->Output($fileName, 'I');
            
        } catch (\Exception $e) {
            // Log error and return JSON response
            \Log::error('PDF generation error: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate PDF: ' . $e->getMessage()], 500);
        }
    }

    public function getUrusanOpd($kode_opd)
    {
        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

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