<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index() {
        return view('guru.pengaduan.index', [
            'title' => 'Daftar Pengaduan Siswa',
            'pengaduans' => Pengaduan::with('siswa')->paginate(10)
        ]);
    }

    public function show(Pengaduan $pengaduan) {
        if ($pengaduan->status === 'belum dibaca') {
            $pengaduan->update(['status' => 'dibaca']);
        }
        // return view('guru.pengaduan.show', [
        //     'pengaduans' => $pengaduan
        // ]);

        return dd($pengaduan->toArray());
    }
}
