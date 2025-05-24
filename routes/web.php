<?php

use App\Http\Controllers\Siswa\PengaduanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\DataDiriController;
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
            Route::patch('/guru/{guru}', 'updateGuru')->name('guru.update');
            Route::get('/guru/{guru}', 'showGuru')->name('guru.show');
            Route::delete('/guru/{guru}', 'destroyGuru')->name('guru.destroy');

            //Siswa Management
            Route::get('/siswa', 'indexSiswa')->name('siswa.index');
            Route::post('/siswa', 'storeSiswa')->name('siswa.store');
            Route::patch('/siswa/{siswa}', 'updateSiswa')->name('siswa.update');
            Route::get('/siswa/{siswa}', 'showSiswa')->name('siswa.show');
            Route::delete('/siswa/{siswa}', 'destroySiswa')->name('siswa.destroy');
        });
    });

    Route::middleware('siswa')->prefix('siswa')->name('siswa.')->group(function () {
        Route::middleware('dataDiri')->group(function () {
            Route::view('/dashboard', 'siswa.dashboard')->name('dashboard');
            Route::controller(PengaduanController::class)->group(function () {
                Route::get('/pengaduan', 'index')->name('pengaduan.index');
                Route::post('/pengaduan', 'store')->name('pengaduan.store');
            });
        });

        Route::controller(DataDiriController::class)->group(function () {
            Route::get('/isi-data-diri', 'create')->name('datadiri.create');
            Route::patch('/isi-data-diri', 'store')->name('datadiri.store');
        });
    });
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
