<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard', [
            'title' => 'Dashboard - Admin',
            'gurus' => User::where('role', 'guru')->count(),
            'siswas' => User::where('role', 'siswa')->count(),
            'users' => User::where('role', '!=', 'admin')->latest()->paginate(10)
        ]);
    }
}
