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
        $validated = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'telpon' => 'required',
            'jenis_kelamin' => ['required', 'in:laki-laki,perempuan'],
        ]);

        $guru = Guru::firstOrNew(['user_id' => Auth::id()]);
        $guru->fill($validated);
        $guru->save();

        Alert::success('Berhasil', 'Menambahkan Data Diri Anda!');
        return redirect()->route('guru.dashboard');
    }
}
