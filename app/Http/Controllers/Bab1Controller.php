<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bab1;

class Bab1Controller extends Controller
{
    public function index()
    {
        $bab1 = Bab1::all();
        return view('layouts.admin.bab1.index', compact('bab1'));
    }

    public function create()
    {
        return view('layouts.admin.bab1.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'latar_belakang' => 'required',
            'dasar_hukum' => 'required',
            'maksud_tujuan' => 'required',
            'sistematika_penulisan' => 'required',
        ]);

        Bab1::create([
            'latar_belakang' => $request->latar_belakang,
            'dasar_hukum' => $request->dasar_hukum,
            'maksud_tujuan' => $request->maksud_tujuan,
            'sistematika_penulisan' => $request->sistematika_penulisan,
        ]);

        return redirect()->route('layouts.admin.bab1.index')->with('success', 'BAB 1 created successfully');
    }

    public function edit($id)
    {
        $bab1 = Bab1::findOrFail($id);
        return view('layouts.admin.bab1.edit', compact('bab1'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'latar_belakang' => 'required',
            'dasar_hukum' => 'required',
            'maksud_tujuan' => 'required',
            'sistematika_penulisan' => 'required',
        ]);

        $bab1 = Bab1::findOrFail($id);
        $bab1->update([
            'latar_belakang' => $request->latar_belakang,
            'dasar_hukum' => $request->dasar_hukum,
            'maksud_tujuan' => $request->maksud_tujuan,
            'sistematika_penulisan' => $request->sistematika_penulisan,
        ]);

        return redirect()->route('layouts.admin.bab1.index')->with('success', 'BAB 1 updated successfully');
    }

    public function destroy($id)
    {
        $bab1 = Bab1::findOrFail($id);
        $bab1->delete();

        return redirect()->route('layouts.admin.bab1.index')->with('success', 'BAB 1 deleted successfully');
    }
}
