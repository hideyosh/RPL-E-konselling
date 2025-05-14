<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function indexGuru() {
        $users = User::where('role', 'guru')->paginate(10);
        return view('admin.aturguru.index',[
            'gurus' => $users,
            'title' => 'Table Guru'
        ]);
    }

    public function storeGuru(Request $request, User $guru) {

        $request->validate([
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required'],
            'role' => ['required', 'in:admin,guru,siswa']
        ]);

        $store = $request->all();
        $store['password'] = Hash::make($request->password);
        $guru->create($store);

        return redirect()->route('admin.guru.store');

    }

    public function updateGuru(Request $request, User $guru) {
         $request->validate([
            'email' => ['required', 'email',  Rule::unique('users')->ignore($guru->id)],
            'password' => ['nullable'],
            'role' => ['required', 'in:admin,guru,siswa']
        ]);

        $update = $request->all();
        if ($request->filled('password')) {
            $update['password'] = Hash::make($request->password);
        } else {
            unset($update['password']);
        }
        $guru->update($update);

        return redirect()->route('admin.guru.index');
    }

    public function showGuru(User $guru) {
        return view('admin.aturguru.view',[
            'title' => 'Detail Guru',
            'guru' => $guru
        ]);

    }

    public function destroyGuru(User $guru) {
        $guru->delete();

        return redirect()->route('admin.guru.index');

    }

    public function indexSiswa() {
        $users = User::where('role', 'siswa')->paginate(10);
        return view('admin.atursiswa.index',[
            'siswas' => $users,
            'title' => 'Table Siswa'
        ]);
    }

     public function storeSiswa(Request $request, User $siswa) {

        $request->validate([
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required'],
            'role' => ['required', 'in:admin,guru,siswa']
        ]);

        $store = $request->all();
        $store['password'] = Hash::make($request->password);
        $siswa->create($store);

        return redirect()->route('admin.siswa.store');

    }

    public function updateSiswa(Request $request, User $siswa) {
         $request->validate([
            'email' => ['email',  Rule::unique('users')->ignore($siswa->id)],
            'password' => ['nullable'],
            'role' => ['in:admin,guru,siswa']
        ]);

        $update = $request->all();
        if ($request->filled('password')) {
            $update['password'] = Hash::make($request->password);
        } else {
            unset($update['password']);
        }
        $siswa->update($update);

        return redirect()->route('admin.siswa.index');
    }

    public function showSiswa(User $siswa) {
        return view('admin.aturguru.view',[
            'title' => 'Detail Guru',
            'guru' => $siswa
        ]);

    }

    public function destroySiswa(User $siswa) {
        $siswa->delete();

        return redirect()->route('admin.siswa.index');

    }
}
