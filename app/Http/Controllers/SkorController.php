<?php

namespace App\Http\Controllers;

use App\Models\Skor;
use Illuminate\Http\Request;

class SkorController extends Controller
{
    public function index()
    {
        $skors = Skor::orderByDesc('skor')->get();
        return view('admin.skors.index', compact('skors'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'tanggal' => 'required|date',
            'skor' => 'required|numeric',
        ];

        $messages = [
            'nama.required' => 'Nama wajib diisi!',
            'tanggal.required' => 'Tanggal wajib diisi!',
            'tanggal.date' => 'Tanggal tidak valid!',
            'skor.required' => 'Skor wajib diisi!',
            'skor.numeric' => 'Skor harus berupa angka!',
        ];

        $this->validate($request, $rules, $messages);

        Skor::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'skor' => $request->skor,
        ]);

        return redirect()->route('skors')->with('success', 'Skor berhasil ditambahkan');
    }

    public function edit($id)
    {
        $skor = Skor::findOrFail($id);
        return view('admin.skors.edit', compact('skor'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama' => 'required',
            'tanggal' => 'required|date',
            'skor' => 'required|numeric',
        ];

        $messages = [
            'nama.required' => 'Nama wajib diisi!',
            'tanggal.required' => 'Tanggal wajib diisi!',
            'tanggal.date' => 'Tanggal tidak valid!',
            'skor.required' => 'Skor wajib diisi!',
            'skor.numeric' => 'Skor harus berupa angka!',
        ];

        $this->validate($request, $rules, $messages);

        $skor = Skor::findOrFail($id);
        $skor->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'skor' => $request->skor,
        ]);

        return redirect()->route('skors')->with('success', 'Skor berhasil diupdate');
    }

    public function destroy($id)
    {
        Skor::findOrFail($id)->delete();
        return redirect()->route('skors')->with('success', 'Skor berhasil dihapus');
    }

    public function skorFrontend(Request $request)
    {
        $bulan = $request->query('bulan', now()->month);
        $skors = Skor::whereMonth('tanggal', $bulan)
            ->orderByDesc('skor')
            ->get();

        return view('membership.skor', compact('skors', 'bulan'));
    }
}
