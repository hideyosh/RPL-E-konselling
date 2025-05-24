<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function indexGuru() {
        return view('admin.aturguru.index',[
            'gurus' => User::where('role', 'guru')->paginate(10),
            'title' => 'Table Guru'
        ]);
    }

    public function storeGuru(Request $request) {

        $request->validate([
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required'],
            'role' => ['required', 'in:admin,guru,siswa']
        ]);

        $store = $request->all();
        $store['password'] = Hash::make($request->password);
        $user = User::create($store);

        if ($user->role == 'guru') {
            Guru::create([
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('admin.guru.index');

    }

    public function updateGuru(Request $request, User $guru) {
         $request->validate([
            'email' => ['required', 'email',  Rule::unique('users')->ignore($guru->id)],
            'password' => ['nullable'],
            'role' => ['required', 'in:admin,guru,siswa']
        ]);

        $update = $request->only(['email', 'password', 'role']);
        if ($request->role !== 'guru') {
            Guru::where('user_id', $guru->id)->delete();
            Siswa::firstOrCreate([
                'user_id' => $guru->id
            ]);
        }

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
        return view('admin.atursiswa.index',[
            'siswas' => User::where('role', 'siswa')->paginate(10),
            'title' => 'Table Siswa'
        ]);
    }

     public function storeSiswa(Request $request) {

        $request->validate([
            'email' => ['required', 'unique:users', 'email'],
            'password' => 'required',
            'role' => ['required', 'in:admin,guru,siswa']
        ]);

        $store = $request->all();
        $store['password'] = Hash::make($request->password);
        $user = User::create($store);

         if ($user->role == 'siswa') {
            Siswa::create([
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('admin.siswa.index');

    }

    public function updateSiswa(Request $request, User $siswa) {
         $request->validate([
            'email' => ['email',  Rule::unique('users')->ignore($siswa->id)],
            'password' => ['nullable'],
            'role' => ['in:admin,guru,siswa']
        ]);

        $update = $request->only(['email', 'password', 'role']);

         if ($request->role !== 'siswa') {
            Siswa::where('user_id', $siswa->id)->delete();
            Guru::firstOrCreate([
                'user_id' => $siswa->id
            ]);
        }

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
