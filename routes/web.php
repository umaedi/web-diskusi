<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
//route for auth
Route::middleware('guest')->group(function() {
    Route::get('/login', [Auth\LoginController::class, 'index'])->name('login');
    Route::post('/login', [Auth\LoginController::class, 'login']);
});

Route::get('/cari', CariController::class);
//route untuk halaman home
Route::get('/', HomeController::class);

//route untuk informasi
Route::controller(InformasiController::class)->group(function() {
    Route::get('/informasi/{id}', 'index');
    Route::post('/informasi/store', 'store');
});

//route untuk topik diskusi
Route::controller(DiskusiController::class)->group(function() {
    Route::get('/posting-diskusi', 'index')->name('posting-diskusi');
    Route::post('/diskusi/store', 'store');
    Route::get('/diskusi/edit/{id}', 'edit');
    Route::post('/diskusi/update/{id}', 'update');
    Route::post('/diskusi/destroy/{id}', 'destroy');
});

//route untuk forum diskusi
Route::controller(ForumController::class)->group(function() {
    Route::get('/forum-diskusi/{id}', 'index');
    Route::post('/forum-diskusi/store', 'store');
});
Route::post('/upload', [Main\TrixUploadController::class, 'upload'])->name('user.trix.upload');
//route for admin or operator
Route::middleware('auth')->prefix('admin')->group(function() {
    Route::get('/dashboard', Main\DashboardController::class);

    Route::controller(Main\InformasiController::class)->group(function() {
        Route::get('/informasi', 'index')->name('main.informasi');
        Route::get('/informasi/create', 'create')->name('main.informasi.create');
        Route::post('/informasi/store', 'store')->name('main.informasi.store');
        Route::get('/informasi/show/{id}', 'show');
        Route::get('/informasi/edit/{id}', 'edit');
        Route::put('/informasi/update/{id}', 'update');
        Route::delete('/informasi/destroy/{id}', 'destroy');
    });

    //route for komentar
    Route::post('/komentar/store', Main\KomentarController::class);

    //route for diskusi
    Route::controller(Main\DiskusiController::class)->group(function() {
        Route::get('/diskusi', 'index')->name('main.diskusi');
        Route::get('/diskusi/show/{id}', 'show')->name('main.diskusi.show');
        Route::post('/diskusi/destroy/{id}', 'destroy');
        Route::get('/diskusi/delete/{id}', 'delkomentar');
    });

    //route for forum diskusi
    Route::post('/forum-diskusi/store', Main\ForumController::class);

    //route for operator
    Route::controller(Main\OperatorController::class)->group(function() {
        Route::get('/operator', 'index')->name('main.operator');
        Route::get('/operator/create', 'create')->name('main.operator.create');
        Route::post('/operator/store', 'store')->name('main.operator.store');
        Route::get('/operator/show', 'show');
        Route::put('/operator/update/{id}', 'update');
        Route::get('/operator/delete/{id}', 'destroy');
    });

    Route::controller(Main\ProfileController::class)->group(function() {
        Route::get('/profile/{id}', 'index')->name('main.profile');
        Route::get('logout', 'logout');
    });

    Route::controller(Main\KategoriController::class)->group(function() {
        Route::get('/kategori', 'index')->name('main.kategori');
        Route::get('/kategori/create', 'create')->name('main.kategori.create');
        Route::post('/kategori/store', 'store')->name('main.kategori.store');
        Route::get('/kategori/show/{id}', 'show');
        Route::post('/kategori/update/{id}', 'update');
        Route::get('/kategori/delete/{id}', 'delete');
    });

    Route::get('/statistik', [Main\StatistikController::class, 'index']);
    Route::get('/statistik/print', [Main\StatistikController::class, 'print']);
    
    //route for diskusi
    // Route::controller(Main\TopikController::class)->group(function() {
    //     Route::get('/topik', 'index')->name('main.topik');
    //     Route::get('/topik/create', 'create')->name('main.topik.create');
    //     Route::post('/topik/store', 'store')->name('main.topik.create');
    // });
    Route::get('/cari', CariController::class);

    Route::post('/upload', [Main\TrixUploadController::class, 'upload'])->name('trix.upload');
});

Route::get('/migrate', function() {
    Artisan::call('migrate:fresh', [
        '--seed' => true,
    ]);
    return \redirect('/');
});

