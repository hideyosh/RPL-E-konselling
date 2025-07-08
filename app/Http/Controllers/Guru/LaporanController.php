<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Konseling;
use App\Models\Siswa;
use App\Models\hasilKonseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
{
    public function index() {
        return view('guru.laporan.index', [
            'title' => 'Daftar Laporan Hasil Konseling',
            'konselings' => Konseling::where('status', 'selesai')->with(['siswa', 'hasilKonseling'])->latest()->paginate(10),
            'hasilKonseling' => hasilKonseling::all('id'),
        ]);
    }

    public function create(Konseling $konseling) {
        return view('guru.laporan.create', [
            'title' => 'Tambah Laporan Konseling',
            'konselings' => $konseling
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'konseling_id' => 'required|exists:konselings,id',
            'ringkasan' => 'required',
            'catatan_guru' => 'required'
        ]);

        hasilKonseling::create($validated);
        Alert::success('Berhasil', 'Laporan Telah Dibuat!');
        return redirect()->route('guru.laporan.index');
    }

    public function edit(hasilKonseling $laporan) {
        return view('guru.laporan.edit', [
            'laporan' => $laporan,
            'title' => 'Tambah Laporan Konseling'
        ]);
    }

    public function update(Request $request, hasilKonseling $laporan) {
        $validated = $request->validate([
            'ringkasan' => 'required',
            'catatan_guru' => 'required'
        ]);

        $laporan->update($validated);
        Alert::success('Berhasil', 'Laporan Telah Diubah');

        return redirect()->route('guru.laporan.index');

    }

    public function delete(hasilKonseling $laporan) {
        $laporan->delete();
        Alert::success('Berhasil', 'Laporan Telah Diubah');
        return redirect()->route('guru.laporan.index');
    }
}
