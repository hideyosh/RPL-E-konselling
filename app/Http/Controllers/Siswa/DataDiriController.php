<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DataDiriController extends Controller
{
    public function create() {
        return view('siswa.datadiri.create', [
            'title' => 'Lengkapi Data Diri - Siswa'
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:50'],
            'nisn' => 'required',
            'kelas' => ['required', 'in:10,11,12'],
            'jurusan' => ['required', 'in:AKL,BDP,OTKP,DKV,RPL'],
            'jenis_kelamin' => ['required', 'in:laki-laki,perempuan']
        ]);

        $siswa = Siswa::firstOrNew(['user_id' => Auth::id()]);
        $siswa->fill($validated);
        $siswa->save();

        Alert::success('Berhasil', 'Menambahkan Data Diri Anda!');
        return redirect()->route('siswa.dashboard');
    }
}
