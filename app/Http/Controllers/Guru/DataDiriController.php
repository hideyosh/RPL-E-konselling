<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DataDiriController extends Controller
{
     public function create() {
        return view('guru.datadiri.create', [
            'title' => 'Lengkap Data Diri - Guru'
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'telpon' => 'required',
            'jenis_kelamin' => ['required', 'in:laki-laki,perempuan'],
        ]);

        $guru = Guru::where('user_id', Auth::id())->first();
        $guru->fill($request->only(['nama', 'nip', 'telpon', 'jenis_kelamin']));
        $guru->save();

        Alert::success('Berhasil', 'Menambahkan Data Diri Anda!');
        return redirect()->route('guru.dashboard');
    }
}
