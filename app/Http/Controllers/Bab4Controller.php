<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Models\Bab4;
use App\Models\Jenis;
use App\Models\TahunDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Html;

class Bab4Controller extends Controller
{
    public function index()
    {
        $bab4 = Bab4::with('jenis')->get();
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        if ($response->successful()) {
            $urusan_opd = $response->json()['results'] ?? [];
        } else {
            $urusan_opd = [];
        }

        return view('layouts.admin.bab4.index', compact('bab4', 'jenis', 'urusan_opd', 'tahun'));
    }

    public function create()
    {
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/daftar_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        $data_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];

        return view('layouts.admin.bab4.create', compact('jenis', 'data_opd', 'tahun'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_bab' => 'required',
            'jenis_id' => 'required',
            // 'nama_opd' => 'required',
            // 'bidang_urusan' => 'required',
            // 'bidang1' => 'required',
            // 'bidang2' => 'required',
            'kode_opd' => 'required|string',
            // 'tahun_id' => 'required',
            // 'dasar_hukum' => 'required',
        ]);

        Bab4::create($request->all());

        return redirect()->route('layouts.admin.bab4.index')->with('success', 'BAB 4 created successfully');
    }

    public function edit($id)
    {
        $bab4 = Bab4::findOrFail($id);
        $jenis = Jenis::all();
        $tahun = TahunDokumen::all();

        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->get($apiUrl);

        $urusan_opd = $response->successful() && isset($response->json()['results']) ? $response->json()['results'] : [];

        return view('layouts.admin.bab4.edit', compact('bab4', 'jenis', 'urusan_opd', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bab' => 'required|string|max:255',
            'jenis_id' => 'required|exists:jenis,id',
            // 'nama_opd' => 'required|string',
            // 'bidang_urusan' => 'required|string',
            // 'bidang1' => 'required|string',
            // 'bidang2' => 'required|string',
            'kode_opd' => 'required|string',
            // 'tahun_id' => 'required|exists:tahun_dokumen,id',
            // 'dasar_hukum' => 'required|string',
        ]);

        $bab4 = Bab4::findOrFail($id);
        $bab4->update($request->all());

        return redirect()->route('layouts.admin.bab4.index')->with('success', 'BAB 4 updated successfully');
    }

    public function destroy($id)
    {
        $bab4 = Bab4::findOrFail($id);
        $bab4->delete();

        return redirect()->route('layouts.admin.bab4.index')->with('success', 'BAB 4 deleted successfully');
    }

    public function show($id)
    {
        $bab4 = Bab4::with('jenis')->findOrFail($id);
        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';

        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        if (!$response->successful()) {
            abort(500, 'Failed to fetch data from API');
        }

        $urusan_opd = $response->json()['results'] ?? [];
        $selectedOpd = collect($urusan_opd)->firstWhere('kode_opd', $bab4->kode_opd);

        $selectedBidangUrusan = [];
        if ($selectedOpd) {
            $kodeBidangUrusan = is_array($bab4->kode_bidang_urusan) ? $bab4->kode_bidang_urusan : [$bab4->kode_bidang_urusan];

            foreach ($selectedOpd['bidang_urusan'] ?? [] as $bidang) {
                if (in_array($bidang['kode_bidang_urusan'] ?? '', $kodeBidangUrusan)) {
                    $selectedBidangUrusan[] = $bidang;
                }
            }
        }

        return view('layouts.admin.bab4.show', [
            'bab4' => $bab4,
            'urusan_opd' => $urusan_opd,
            'selectedBidangUrusan' => $selectedBidangUrusan,
        ]);
    }

    public function exportPdf($id)
    {
        try {
            $bab4 = Bab4::findOrFail($id);

            $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
            $response = Http::withHeaders(['Accept' => 'application/json'])->get($apiUrl);

            if (!$response->successful()) {
                throw new \Exception('Failed to fetch data from API');
            }

            $urusan_opd = $response->json()['results'] ?? [];

            $html = view('layouts.admin.bab4.pdf', compact('bab4', 'urusan_opd'))->render();

            $mpdf = new Mpdf([
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P',
                'tempDir' => storage_path('app/temp'),
            ]);

            $mpdf->WriteHTML($html);
            $fileName = 'bab4-' . $id . '.pdf';

            return $mpdf->Output($fileName, 'I');
        } catch (\Exception $e) {
            \Log::error('PDF generation error: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate PDF: ' . $e->getMessage()], 500);
        }
    }

    public function exportWord($id)
    {
        try {
            $bab4 = Bab4::findOrFail($id);

            $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
            $response = Http::withHeaders(['Accept' => 'application/json'])->get($apiUrl);

            if (!$response->successful()) {
                throw new \Exception('Failed to fetch data from API');
            }

            $urusan_opd = $response->json()['results'] ?? [];

            $html = view('layouts.admin.bab4.word', compact('bab4', 'urusan_opd'))->render();

            $phpWord = new PhpWord();
            $section = $phpWord->addSection();

            $text = strip_tags($html); // You may need more complex parsing here based on your needs

            $section->addText($text);

            $fileName = 'bab4-' . $id . '.docx';
            $tempFile = storage_path('app/' . $fileName);
            $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save($tempFile);

            return response()->download($tempFile)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            \Log::error('Word document generation error: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate Word document: ' . $e->getMessage()], 500);
        }
    }


    // public function getUrusanOpd($kode_opd)
    // {
    //     $apiUrl = 'https://kak.madiunkota.go.id/api/opd/urusan_opd';
    //     $response = Http::timeout(30)->withHeaders(['Accept' => 'application/json'])
    //             ->post($apiUrl, ['kode_opd' => $kode_opd]);

    //     if (!$response->successful()) {
    //         return response()->json(['error' => 'Failed to fetch data from API'], 500);
    //     }

    //     $data = $response->json();
    //     $urusan_opd = collect($data['results'] ?? []);
    //     $opd = $urusan_opd->firstWhere('kode_opd', $kode_opd);

    //     if (!$opd) {
    //         return response()->json(['error' => 'OPD not found'], 404);
    //     }

    //     // Extract bidang_urusan from the nested structure
    //     $bidang_urusan = '';
    //     if (isset($opd['urusan_opd']) && is_array($opd['urusan_opd'])) {
    //         foreach ($opd['urusan_opd'] as $urusan) {
    //             if (isset($urusan['bidang_urusan_opd']) && is_array($urusan['bidang_urusan_opd'])) {
    //                 foreach ($urusan['bidang_urusan_opd'] as $bidang) {
    //                     $bidang_urusan .= $bidang['bidang_urusan'] . "\n"; // Append each bidang_urusan with a newline
    //                 }
    //             }
    //         }
    //     }

    //     return response()->json([
    //         'nama_opd' => $opd['nama_opd'] ?? null,
    //         'bidang_urusan' => trim($bidang_urusan), // Trim to remove trailing newline
    //     ]);
    // }
    public function getTujuanOpd($kode_opd)
    {
        $apiUrl = 'https://kak.madiunkota.go.id/api/opd/tujuan_opd';
        $response = Http::withHeaders(['Accept' => 'application/json'])->post($apiUrl);

        if ($response->successful()) {
            $data = $response->json('data');
            return view('tujuan-opd', ['data' => $data]);
        } else {
            return abort(500, 'Gagal mengambil data dari API.');
        }
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
//             $bab4 = Bab1::findOrFail($id);
    
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