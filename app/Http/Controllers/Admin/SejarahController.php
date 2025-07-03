<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sejarah;
use Illuminate\Support\Facades\Storage;

class SejarahController extends Controller
{
    public function index()
    {
        $data = Sejarah::latest()->get();
        return view('admin.sejarah.index', compact('data'));
    }

    public function create()
    {
        return view('admin.sejarah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'isi' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $path = $request->file('gambar')?->store('sejarah', 'public');

        Sejarah::create([
            'isi' => $request->isi,
            'gambar' => $path,
        ]);

        return redirect()->route('admin.sejarah.index')->with('success', 'Sejarah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Sejarah::findOrFail($id);
        return view('admin.sejarah.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Sejarah::findOrFail($id);

        $request->validate([
            'isi' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($data->gambar);
            $data->gambar = $request->file('gambar')->store('sejarah', 'public');
        }

        $data->isi = $request->isi;
        $data->save();

        return redirect()->route('admin.sejarah.index')->with('success', 'Sejarah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Sejarah::findOrFail($id);
        Storage::disk('public')->delete($data->gambar);
        $data->delete();

        return back()->with('success', 'Sejarah berhasil dihapus.');
    }
}
