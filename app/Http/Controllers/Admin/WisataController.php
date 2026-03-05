<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::all();
        return view('admin.wisata.index', compact('wisatas'));
    }

    public function create()
    {
        return view('admin.wisata.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'kategori'    => 'required|array',
            'lokasi'      => 'required|string',
            'deskripsi'   => 'required',
            'gambar'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Proses upload gambar
        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('wisata', 'public');
        }

        // Eksekusi Simpan
        Wisata::create([
            'nama_wisata' => $request->nama_wisata,
            'kategori'    => implode(',', $request->kategori),
            'lokasi'      => $request->lokasi,
            'deskripsi'   => $request->deskripsi,
            'gambar'      => $path,
        ]);

        return redirect()->route('admin.wisata.index')->with('success', 'Wisata berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $wisata = Wisata::findOrFail($id);
        return view('admin.wisata.edit', compact('wisata'));
    }

    public function update(Request $request, $id)
    {
        $wisata = Wisata::findOrFail($id);

        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'kategori'    => 'required|string', // Pakai string karena di edit pakai <select>
            'lokasi'      => 'required|string',
            'deskripsi'   => 'required',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['nama_wisata', 'kategori', 'lokasi', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            if ($wisata->gambar && Storage::disk('public')->exists($wisata->gambar)) {
                Storage::disk('public')->delete($wisata->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('wisata', 'public');
        }

        $wisata->update($data);

        return redirect()->route('admin.wisata.index')->with('success', 'Wisata berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);
        if ($wisata->gambar) {
            Storage::disk('public')->delete($wisata->gambar);
        }
        $wisata->delete();
        return back()->with('success', 'Wisata berhasil dihapus!');
    }
}