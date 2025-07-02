<?php

//Controller Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

//Controller Siswa
use App\Http\Controllers\Siswa\PengaduanController as SiswaPengaduanController;
use App\Http\Controllers\Siswa\DataDiriController as SiswaDataDiriController;
use App\Http\Controllers\Siswa\KonselingController as SiswaKonselingController;

//Controller Guru
use App\Http\Controllers\Guru\PengaduanController as GuruPengaduanController;
use App\Http\Controllers\Guru\DataDiriController as GuruDataDiriController;
use App\Http\Controllers\Guru\KonselingController as GuruKonselingController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
            Route::view('/dashboard', 'dashboard')->name('dashboard');
            Route::controller(SiswaPengaduanController::class)->group(function () {
                Route::get('/pengaduan', 'index')->name('pengaduan.index');
                Route::post('/pengaduan', 'store')->name('pengaduan.store');
                Route::post('/pengaduan/{pengaduan}', 'update')->name('pengaduan.update');
                Route::delete('/pengaduan/{pengaduan}', 'destroy')->name('pengaduan.destroy');
            });
            Route::controller(SiswaKonselingController::class)->group(function () {
                Route::get('/konseling', 'index')->name('konseling.index');
                Route::post('/konseling', 'store')->name('konseling.store');
                Route::patch('/konseling/{konseling}', 'update')->name('konseling.update');
                Route::delete('/konseling/{konseling}', 'destroy')->name('konseling.destroy');
            });
        });
        Route::controller(SiswaDataDiriController::class)->group(function () {
            Route::get('/isi-data-diri', 'create')->name('datadiri.create');
            Route::patch('/isi-data-diri', 'store')->name('datadiri.store');
        });
    });

    Route::middleware('guru')->prefix('guru')->name('guru.')->group(function () {
        Route::middleware('dataDiri')->group(function () {
            Route::view('/dashboard', 'dashboard')->name('dashboard');
            Route::controller(GuruPengaduanController::class)->group(function () {
                Route::get('/pengaduan', 'index')->name('pengaduan.index');
                Route::get('/pengaduan/{pengaduan}', 'show')->name('pengaduan.show');
            });
            Route::controller(GuruKonselingController::class)->group(function () {
                Route::get('/konseling', 'index')->name('konseling.index');
                Route::patch('/konseling/{konseling}', 'update')->name('konseling.update');
            });
        });
        Route::controller(GuruDataDiriController::class)->group(function () {
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
