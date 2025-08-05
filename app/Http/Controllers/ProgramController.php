<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProgramController extends Controller
{
    public function index() {
        return view('admin.programs.index', [
            'programs' => Program::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(Request $request) {
        $rules = [
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'harga' => 'nullable|numeric',
            'gambar' => 'required|max:1000|mimes:jpg,jpeg,png,webp',
        ];

        $messages = [
            'nama.required' => 'Nama program wajib diisi!',
            'gambar.required' => 'Gambar wajib diisi!',
            'harga.numeric' => 'Harga harus berupa angka!',
        ];

        $this->validate($request, $rules, $messages);

        // Image
        $fileName = time() . '.' . $request->gambar->extension();
        $request->file('gambar')->storeAs('public/programs/', $fileName);

        Program::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $fileName,
        ]);

        return redirect()->route('programs')->with('success', 'Data program berhasil disimpan');
    }

    public function update(Request $request, $id) {
        $program = Program::find($id);

        // Jika ada gambar baru
        if ($request->hasFile('gambar')) {
            $fileCheck = 'required|max:1000|mimes:jpg,jpeg,png,webp';
        } else {
            $fileCheck = '';
        }

        $rules = [
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'harga' => 'nullable|numeric',
            'gambar' => $fileCheck,
        ];

        $messages = [
            'nama.required' => 'Nama program wajib diisi!',
            'harga.numeric' => 'Harga harus berupa angka!',
        ];

        $this->validate($request, $rules, $messages);

        // Cek jika ada gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if (File::exists(storage_path('app/public/programs/' . $program->gambar))) {
            File::delete(storage_path('app/public/programs/' . $program->gambar));
        }

            
            $fileName = time() . '.' . $request->gambar->extension();
            $request->file('gambar')->storeAs('public/programs/', $fileName);
            $program->gambar = $fileName;
        }

        $program->nama = $request->nama;
        $program->deskripsi = $request->deskripsi;
        $program->harga = $request->harga;
        $program->save();

        return redirect(route('programs'))->with('success', 'data program berhasil di update');
    }

    public function destroy($id) {
        $program = Program::findOrFail($id);
        
        // Hapus gambar jika ada
        $path = storage_path('app/public/programs/' . $program->gambar);
        if (File::exists($path)) {
            File::delete($path);
        }

        
        $program->delete();   
        return redirect(route('programs'))->with('success', 'data program berhasil di hapus');
        
    }

    public function programFrontend() {
        $programs = Program::orderBy('id', 'desc')->get();
        return view('program.program', compact('programs'));
    }
}