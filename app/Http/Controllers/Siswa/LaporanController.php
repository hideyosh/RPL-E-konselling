<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\hasilKonseling;
use App\Models\Konseling;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index() {
        return view('siswa.laporan.index', [
            'title' => 'Daftar Laporan Hasil Konseling',
            'konselings' => Konseling::where('status', 'selesai')->with(['guru', 'hasilKonseling'])->latest()->paginate(10),
            'hasilKonseling' => hasilKonseling::all(),
        ]);
    }
}
