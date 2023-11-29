<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\JadwalTayangController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenggunaController;
use App\Models\Pemesanan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
        Route::resource('film', FilmController::class);
        Route::resource('studio', StudioController::class);
        Route::delete('/destroy_kursi/{id}', [StudioController::class, 'destroy_kursi'])->name('destroy_kursi');
        Route::post('/store_kursi', [StudioController::class, 'store_kursi'])->name('store_kursi');
        Route::resource('jadwal_tayang', JadwalTayangController::class);
        Route::resource('pemesanan', PemesananController::class);
        Route::get('/print', [PemesananController::class, 'print'])->name('pemesanan.print');
        Route::put('/confirmation/{id}', [PemesananController::class, 'confirmation'])->name('pemesanan.confirmation');
    });

    Route::middleware(['user'])->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::get('/detail_film/{id}', [UserController::class, 'detail_film'])->name('detail_film');
        Route::get('/payment/{id}', [UserController::class, 'payment'])->name('payment');
        Route::put('/update_payment/{id}', [UserController::class, 'update_payment'])->name('update_payment');
        Route::post('/store_ticket', [UserController::class, 'store_ticket'])->name('store_ticket');
    });
});
