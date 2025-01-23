<?php

use App\Http\Controllers\FasilitasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TamuController;
use App\Models\Fasilitas;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

 Route::get('/rooms', [TamuController::class, 'index'])->name('tamu.rooms')->middleware('auth');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('tamu.dashboard');
    Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
    Route::get('/fasilitas', [DetailController::class, 'index'])->name('fasilitas.index');


Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/rooms', [AdminController::class, 'index'])->name('admin.kamar.index');
    Route::get('/admin/rooms/create', [AdminController::class, 'create'])->name('admin.kamar.create');
    Route::post('/admin/rooms', [AdminController::class, 'store'])->name('admin.kamar.store');
    Route::get('/admin/rooms/{id}/edit', [AdminController::class, 'edit'])->name('admin.kamar.edit');
    Route::put('/admin/rooms/{id}', [AdminController::class, 'update'])->name('admin.kamar.update');
    Route::delete('/admin/rooms/{id}', [AdminController::class, 'destroy'])->name('admin.kamar.destroy');
    Route::get('/admin/facilities', [FasilitasController::class, 'index'])->name('admin.fasilitas.index');
    Route::get('/admin/facilities/create', [FasilitasController::class, 'create'])->name('admin.fasilitas.create');
    Route::post('/admin/facilities', [FasilitasController::class, 'store'])->name('admin.fasilitas.store');
    Route::get('/admin/facilities/{id}/edit', [FasilitasController::class, 'edit'])->name('admin.fasilitas.edit');
    Route::put('/admin/facilities/{id}', [FasilitasController::class, 'update'])->name('admin.fasilitas.update');
    Route::delete('/admin/facilities/{id}', [FasilitasController::class, 'destroy'])->name('admin.fasilitas.destroy');
});

Route::middleware(['role:resepsionis'])->group(function () {
    // Rute untuk Resepsionis
Route::get('/reservasi', [ResepsionisController::class, 'index'])->name('resepsionis.index');
Route::post('/reservasi/filter', [ResepsionisController::class, 'filter'])->name('resepsionis.filter');
Route::post('/reservasi/search', [ResepsionisController::class, 'search'])->name('resepsionis.search');
});

Route::middleware(['role:tamu'])->group(function () {
    // Rute untuk Tamu
   

    Route::post('/reservations', [TamuController::class, 'store'])->name('tamu.rooms.store');
    Route::get('/tamu/print/{id}', [TamuController::class, 'print'])->name('tamu.print');
});

Route::get('/reservations/{id}/print', [TamuController::class, 'print'])->name('reservations.print')->middleware('role:guest');

