<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataDiriController extends Controller
{
    public function create() {
        return view('siswa.datadiri.create', [
            'title' => 'Lengkapi Data Diri - Siswa'
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => ['required', 'string', 'max:50'],
            'nisn' => 'required',
            'kelas' => ['required', 'in:10,11,12'],
            'jurusan' => ['required', 'in:AKL,BDP,OTKP,DKV,RPL'],
            'jenis_kelamin' => ['required', 'in:laki-laki,perempuan']
        ]);

        $siswa = Siswa::where('user_id', Auth::id())->first();
        $siswa->fill($request->only(['nama', 'nisn', 'kelas', 'jurusan', 'jenis_kelamin']));
        $siswa->save();

        return redirect()->route('siswa.dashboard');
    }
}
