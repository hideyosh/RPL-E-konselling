<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Konseling;
use App\Models\hasilKonseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonselingController extends Controller
{
    public function index(Request $request) {
        $query = Konseling::with('siswa')->where('guru_id', Auth::user()->guru->id)->latest();

        if ($request->has('status')) {
            $status = $request->input('status');
            $query->whereIn('status', $status);
        }

        $konselings = $query->paginate(10);

        return view('guru.konseling.index',[
            'title' => 'Daftar Janji Temu Konseling',
            'gurus' => Guru::all('nama'),
            'konselings' => $konselings
        ]);
    }

    public function update(Konseling $konseling, Request $request) {
        $request->validate([
            'status' => 'required'
        ]);

        $konseling->update([
            'status' => $request->status
        ]);

        return redirect()->back();
   }

   public function laporanIndex() {
        return view('guru.konseling.laporan', [

        ]);
   }
}
