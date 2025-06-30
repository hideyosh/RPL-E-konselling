<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index(Request $request) {
        $query =  Pengaduan::with('siswa')->latest();

        if ($request->has('status')) {
            $status = $request->input('status');

            $query->when(in_array('belum dibaca', $status), function ($q) {
                $q->orWhere('status', 'belum dibaca');
            });

            $query->when(in_array('dibaca', $status), function ($q) {
                $q->orWhere('status', 'dibaca');
            });
        }

        $pengaduans = $query->paginate(10);

        return view('guru.pengaduan.index', [
            'title' => 'Daftar Pengaduan Siswa',
            'pengaduans' => $pengaduans
        ]);
    }

    public function show(Pengaduan $pengaduan) {
        if ($pengaduan->status === 'belum dibaca') {
            $pengaduan->update(['status' => 'dibaca']);
        }
        return view('guru.pengaduan.show', [
            'pengaduan' => $pengaduan,
            'title' => 'Pengaduan Siswa'
        ]);
    }
}
