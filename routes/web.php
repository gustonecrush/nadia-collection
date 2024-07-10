<?php

use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\HotelMadinahController;
use App\Http\Controllers\HotelMekahController;
use App\Http\Controllers\PaketUmrahController;
use App\Http\Controllers\PesawatController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index');

Route::get('/admin/dashboard', function () {
    return view('dashboard.index');
})->name('admin.dashboard');

Route::get('/admin/login', [AuthAdminController::class, 'index']);
Route::post('/admin/login', [AuthAdminController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AuthAdminController::class, 'logout'])->name('admin.logout');

Route::get('/admin/hotel-mekah', [HotelMekahController::class, 'index'])->name('admin.hotel-mekah');
Route::post('/admin/hotel-mekah', [HotelMekahController::class, 'store'])->name('admin.hotel-mekah.store');
Route::post('/admin/hotel-mekah/update', [HotelMekahController::class, 'update'])->name('admin.hotel-mekah.update');
Route::delete('/admin/hotel-mekah/{id}', [HotelMekahController::class, 'destroy'])->name('admin.hotel-mekah.delete');

Route::get('/admin/hotel-madinah', [HotelMadinahController::class, 'index'])->name('admin.hotel-madinah');
Route::post('/admin/hotel-madinah', [HotelMadinahController::class, 'store'])->name('admin.hotel-madinah.store');
Route::put('/admin/hotel-madinah', [HotelMadinahController::class, 'update'])->name('admin.hotel-madinah.update');
Route::delete('/admin/hotel-madinah/{id}', [HotelMadinahController::class, 'destroy'])->name('admin.hotel-madinah.delete');

Route::get('/admin/pesawat', [PesawatController::class, 'index'])->name('admin.pesawat');
Route::post('/admin/pesawat', [PesawatController::class, 'store'])->name('admin.pesawat.store');
Route::put('/admin/pesawat', [PesawatController::class, 'update'])->name('admin.pesawat.update');
Route::delete('/admin/pesawat/{id}', [PesawatController::class, 'destroy'])->name('admin.pesawat.delete');

Route::get('/admin/paket-umrah', [PaketUmrahController::class, 'index'])->name('admin.paket-umrah');
Route::post('/admin/paket-umrah', [PaketUmrahController::class, 'store'])->name('admin.paket-umrah.store');
Route::put('/admin/paket-umrah', [PaketUmrahController::class, 'update'])->name('admin.paket-umrah.update');
Route::delete('/admin/paket-umrah/{id}', [PaketUmrahController::class, 'destroy'])->name('admin.paket-umrah.delete');
