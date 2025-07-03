<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{
    public function index(Request $request) {
        $query =  Pengaduan::with('guru')->where('siswa_id', Auth::user()->siswa->id)->latest();

        if ($request->has('status')) {
            $status = $request->input('status');
            $query->whereIn('status', $status);
        }

        $pengaduans = $query->paginate(10);

        return view('siswa.pengaduan.index', [
            'pengaduans' => $pengaduans,
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

        Alert::success('Berhasil', 'Pengaduan Telah Diajukan!');
        return redirect()->back();
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

        Alert::success('Berhasil', 'Pengaduan berhasil diupdate!');
        return redirect()->back();
    }

    public function destroy(Pengaduan $pengaduan) {
        $pengaduan->delete();
        Alert::success('Berhasil', 'Pengaduan Telah Dihapus!');
        return redirect()->route('siswa.pengaduan.index');
    }
}

