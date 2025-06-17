<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index() {
        return view('siswa.pengaduan.index', [
            'pengaduans' => Pengaduan::with('guru')->where('siswa_id', Auth::user()->siswa->id)->paginate(10),
            'gurus' => Guru::all(),
            'title' => ' Pengaduan'
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'guru_id' => 'required',
            'isi_pengaduan' => 'required',
        ]);

        Pengaduan::create([
            'siswa_id' => Auth::user()->siswa->id,
            'guru_id' => $request->guru_id,
            'isi_pengaduan' => $request->isi_pengaduan
        ]);

         return redirect()->back()->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function update(Request $request, Pengaduan $pengaduan) {
        $request->validate([
            'guru_id' => 'required',
            'isi_pengaduan' => 'required',
        ]);

        $pengaduan->update([
            'guru_id' => $request->guru_id,
            'isi_pengaduan' => $request->isi_pengaduan
        ]);

        return redirect()->back()->with('success', 'Pengaduan berhasil diupdate.');
    }

    public function destroy(Pengaduan $pengaduan) {
        $pengaduan->delete();
        return redirect()->route('siswa.pengaduan.index');
    }
}

