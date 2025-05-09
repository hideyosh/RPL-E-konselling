<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.aturguru.index', [
            'gurus' => User::where('role', 'guru')->paginate(10),
            'title' => 'Guru'
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.aturguru.create', [
            'users' => User::where('role', 'guru')
            ->whereNotIn('id', function ($query) {
                $query->select('users_id')->from('gurus');
            })->pluck('email', 'id'),
            'title' => 'Tambah Guru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $guru)
    {
        $request->validate([
            'users_id' => ['required', 'unique:gurus,users_id'],
            'nama' => ['required', 'string'],
            'nip' => ['required', 'string'],
            'telpon' => ['required', 'string'],
            'jenis_kelamin' => ['required']
        ]);

        $store = $request->all();
        $guru->create($store);
        return redirect()->route('guru.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $guru)
    {
        return view('admin.aturguru.view', [
            'gurus' => $guru,
            'title' => 'Lihat Guru'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $guru)
    {
        return view('admin.aturguru.edit', [
            'gurus' => $guru,
            'title' => 'Edit Guru'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $guru)
    {
        $request->validate([
            'users_id' => ['required', 'unique:gurus,users_id'],
            'nama' => ['required', 'string'],
            'nip' => ['required', 'string'],
            'telpon' => ['required', 'string'],
            'jenis_kelamin' => ['required']
        ]);

        $update = $request->all();
        $guru->update($update);
        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index');
    }
}
