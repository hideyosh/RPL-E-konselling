<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{
    public function index(Request $request) {
        $query =  Pengaduan::with('siswa')->where('guru_id', Auth::user()->guru->id)->latest();

        if ($request->has('status')) {
            $status = $request->input('status');
            $query->whereIn('status', $status);
        }

        $pengaduans = $query->paginate(10);

        return view('guru.pengaduan.index', [
            'title' => 'Daftar Pengaduan Siswa',
            'pengaduans' => $pengaduans
        ]);
    }

    public function show(Pengaduan $pengaduan) {
        if ($pengaduan->status === 'belum_dibaca') {
            $pengaduan->update(['status' => 'dibaca']);
            Alert::success('Berhasil', 'Pengaduan telah terbaca');
        }
        return view('guru.pengaduan.show', [
            'pengaduan' => $pengaduan,
            'title' => 'Pengaduan Siswa'
        ]);
    }
}
