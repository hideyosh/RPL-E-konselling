<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $gurus = User::where('role', 'guru')->count();
        $siswas = User::where('role', 'siswa')->count();
        $users = User::latest()->paginate(10);

        return view('admin.dashboard', [
            'gurus' => $gurus,
            'siswas' => $siswas,
            'users' => $users
        ]);
    }
}
