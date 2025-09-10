<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.event.index', [
            'events' => Event::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required|string|max:255',
            'image' => 'required|mimes:jpg,jpeg,png,webp|max:2048',
            'desc' => 'required|min:20',
        ];

        $messages = [
            'judul.required' => 'Judul wajib diisi!',
            'image.required' => 'Gambar wajib diunggah!',
            'desc.required' => 'Deskripsi wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // Upload gambar utama
        $fileName = time() . '.' . $request->image->extension();
        $request->file('image')->storeAs('public/event/', $fileName);

        // Proses deskripsi dengan gambar embed
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($request->desc, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();

        $storage = 'storage/content-event';
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/?(?<mime>.*?);/', $src, $groups);
                $mimetype = $groups['mime'] ?? 'png';
                $fileNameContentRand = uniqid() . '_' . time() . '.' . $mimetype;
                $filePath = "$storage/$fileNameContentRand";
                Image::make($src)->resize(1440, 720)->encode($mimetype, 100)->save(public_path($filePath));
                $img->setAttribute('src', asset($filePath));
                $img->setAttribute('class', 'img-fluid');
            }
        }

        Event::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'image' => $fileName,
            'desc' => $dom->saveHTML(),
        ]);

        return redirect()->route('event')->with('success', 'Event berhasil ditambahkan');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $rules = [
            'judul' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'desc' => 'required|min:20',
        ];

        $this->validate($request, $rules);

        // Upload gambar baru jika ada
        if ($request->hasFile('image')) {
            if (File::exists('storage/event/' . $event->image)) {
                File::delete('storage/event/' . $event->image);
            }
            $fileName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('public/event/', $fileName);
        } else {
            $fileName = $event->image;
        }

        // Proses deskripsi dengan gambar embed
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($request->desc, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();

        $storage = 'storage/content-event';
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/?(?<mime>.*?);/', $src, $groups);
                $mimetype = $groups['mime'] ?? 'png';
                $fileNameContentRand = uniqid() . '_' . time() . '.' . $mimetype;
                $filePath = "$storage/$fileNameContentRand";
                Image::make($src)->resize(1440, 720)->encode($mimetype, 100)->save(public_path($filePath));
                $img->setAttribute('src', asset($filePath));
                $img->setAttribute('class', 'img-fluid');
            }
        }

        $event->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'image' => $fileName,
            'desc' => $dom->saveHTML(),
        ]);

        return redirect()->route('event')->with('success', 'Event berhasil diperbarui');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if (File::exists('storage/event/' . $event->image)) {
            File::delete('storage/event/' . $event->image);
        }

        $event->delete();

        return redirect()->route('event')->with('success', 'Event berhasil dihapus');
    }

    public function detail($slug)
    {
        // cari event berdasarkan slug
        $event = Event::where('slug', $slug)->firstOrFail();

        // arahkan ke view detail event
        return view('events.detail', compact('event'));
    }

}
