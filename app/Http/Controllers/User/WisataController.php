<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function index(Request $request)
    {
        $query = Wisata::query();

        // 1. Filter Pencarian Nama
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_wisata', 'like', '%' . $request->search . '%');
        }

        // 2. Filter Kategori (Multi-Kategori Support)
        // Menggunakan LIKE agar jika data di database "Alam,Sejarah",
        // pencarian "Sejarah" tetap menemukannya.
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', 'LIKE', '%' . $request->kategori . '%');
        }

        // Ambil Data
        $wisatas = $query->get();
        
        // Ambil Rekomendasi (5 Random)
        $rekomendasi = Wisata::inRandomOrder()->limit(5)->get();

        // Return ke View (Pastikan nama filenya sesuai lokasi kamu: user/home.blade.php)
        return view('user.home', compact('wisatas', 'rekomendasi'));
    }
}