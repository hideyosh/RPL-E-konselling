<?php

use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Siswa\PengaduanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard-admin', function () {
        return view('admin.dashboard');
    })->name('dashboard-admin');

    Route::resource('guru', GuruController::class);
});

Route::middleware(['auth', 'siswa'])->group(function () {

});

// Route::get('/dashboard-siswa', function () {
//     return view('siswa.dashboard');
// });

Route::resource('pengaduan', PengaduanController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
