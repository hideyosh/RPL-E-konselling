<?php

use App\Http\Controllers\Siswa\PengaduanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    //Admin
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::controller(UserController::class)->group(function (){
            //Guru Management
            Route::get('/guru', 'indexGuru')->name('guru.index');
            Route::post('/guru', 'storeGuru')->name('guru.store');
            Route::put('/guru/{guru}', 'updateGuru')->name('guru.update');
            Route::get('/guru/{guru}', 'showGuru')->name('guru.show');
            Route::delete('/guru/{guru}', 'destroyGuru')->name('guru.destroy');
            
            //Siswa Management
            Route::get('/siswa', 'indexSiswa')->name('siswa.index');
            Route::post('/siswa', 'storeSiswa')->name('siswa.store');
            Route::put('/siswa/{siswa}', 'updateSiswa')->name('siswa.update');
            Route::get('/siswa/{siswa}', 'showSiswa')->name('siswa.show');
            Route::delete('/siswa/{siswa}', 'destroySiswa')->name('siswa.destroy');
        });
    });

    Route::middleware('siswa')->prefix('siswa')->name('siswwa')->group(function () {
        Route::resource('pengaduan', PengaduanController::class);
    });
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
