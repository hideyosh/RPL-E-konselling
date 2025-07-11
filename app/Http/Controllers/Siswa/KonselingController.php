<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Konseling;
use App\Models\Guru;
use RealRashid\SweetAlert\Facades\Alert;
class KonselingController extends Controller
{
    public function index(Request $request) {
        $query = Konseling::with('guru')->where('siswa_id', Auth::user()->siswa->id)->latest();

        if ($request->has('status')) {
            $status = $request->input('status');
            $query->whereIn('status', $status);
        }

        $konselings = $query->paginate(10);
        return view('siswa.konseling.index', [
            'title' => 'Daftar Janji Temu Konseling',
            'gurus' => Guru::all(['id', 'nama']),
            'konselings' => $konselings
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'guru_id' => 'required',
            'janji_temu' => 'required',
            'topik_masalah' => 'required'
        ]);

        Konseling::create([
            'siswa_id' => Auth::user()->siswa->id,
            'guru_id' => $request->guru_id,
            'janji_temu' => $request->janji_temu,
            'topik_masalah' => $request->topik_masalah
        ]);

        Alert::success('Berhasil', 'Janji Temu Telah Diajukan!');
        return redirect()->back();
    }

    public function update(Konseling $konseling ,Request $request) {
        $request->validate([
            'guru_id' => 'required',
            'janji_temu' => 'required',
            'topik_masalah' => 'required'
        ]);

        $konseling->update([
            'guru_id' => $request->guru_id,
            'janji_temu' => $request->janji_temu,
            'topik_masalah' => $request->topik_masalah
        ]);

        return redirect()->back();
    }

    public function destroy(Konseling $konseling) {
        $konseling->delete();
        Alert::success('Berhasil', 'Janji Temu Telah Dihapus!');
        return redirect()->route('siswa.konseling.index');
    }

    public function laporanIndex() {
        return view('siswa.konseling.laporan', [
            // $laporans => hasilKonseling::with('konseling')->get()
            'konselings' => Konseling::with('guru')->get()
        ]);
    }
}
