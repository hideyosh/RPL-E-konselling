<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Konselling;
use Illuminate\Http\Request;

class KonsellingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('siswa.pengaduan.index', [
        //     'gurus' => Konselling::paginate(10),
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(konselling $konselling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(konselling $konselling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, konselling $konselling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(konselling $konselling)
    {
        //
    }
}
