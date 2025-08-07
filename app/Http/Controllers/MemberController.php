<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::query();

        // Filter berdasarkan status jika ada query ?status=...
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $members = $query->latest()->get();

        return view('admin.members.index', compact('members'));
    }

        // Form edit member
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('admin.members.edit', compact('member'));
    }

    // Proses update member
    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'pekerjaan' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'status' => 'required|in:pendaftar,anggota aktif,keluar',
            'alamat' => 'required|string',
            'program' => 'nullable|string|max:255',
            'metode_pembayaran' => 'nullable|string|max:50',
            'kontak_orangtua' => 'nullable|string|max:255',
            'catatan_admin' => 'nullable|string',
            'bukti_pembayaran' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            if ($member->bukti_pembayaran_path && Storage::exists('public/'.$member->bukti_pembayaran_path)) {
                Storage::delete('public/'.$member->bukti_pembayaran_path);
            }

            $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
            $validated['bukti_pembayaran_path'] = $path;
        }

        $member->update($validated);

        return redirect()->route('admin.members.index')->with('success', 'Data member berhasil diperbarui');
    }

    public function destroy(Member $member)
    {
        // Hapus file bukti pembayaran jika ada
        if ($member->bukti_pembayaran_path) {
            Storage::delete('public/'.$member->bukti_pembayaran_path);
        }
        
        // Hapus data member
        $member->delete();
        
        return redirect()->route('admin.members.index')
                    ->with('success', 'Member berhasil dihapus');
    }
    
    public function create()
    {
        return view('membership.daftar'); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
            'email' => 'nullable|email',
            'pekerjaan' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'metode_pembayaran' => 'required|in:Transfer Bank,E-Wallet,Tunai',
            'bukti_pembayaran' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        // Simpan file bukti pembayaran
        if ($request->hasFile('bukti_pembayaran')) {
            $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
            $validated['bukti_pembayaran_path'] = $path;
        }

        // Buat record member baru
        Member::create($validated);

        return redirect()->route('membership.daftar')
                         ->with('success', 'Pendaftaran berhasil! Terima kasih telah mendaftar. Kami akan menghubungi Anda segera.');
    }
}