<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\BahanMentahController;
use App\Http\Controllers\HasilProduksiController;
use App\Http\Controllers\HotelMadinahController;
use App\Http\Controllers\HotelMekahController;
use App\Http\Controllers\PaketUmrahController;
use App\Http\Controllers\PesawatController;
use App\Http\Controllers\SupplierController;
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

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/dashboard/data', [AdminDashboardController::class, 'getData'])->name('admin.dashboard.data');

Route::get('/admin/login', [AdminAuthController::class, 'index']);
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin/hotel-mekah', [HotelMekahController::class, 'index'])->name('admin.hotel-mekah');
Route::post('/admin/hotel-mekah', [HotelMekahController::class, 'store'])->name('admin.hotel-mekah.store');
Route::post('/admin/hotel-mekah/update', [HotelMekahController::class, 'update'])->name('admin.hotel-mekah.update');
Route::delete('/admin/hotel-mekah/{id}', [HotelMekahController::class, 'destroy'])->name('admin.hotel-mekah.delete');

Route::get('/admin/hotel-madinah', [HotelMadinahController::class, 'index'])->name('admin.hotel-madinah');
Route::post('/admin/hotel-madinah', [HotelMadinahController::class, 'store'])->name('admin.hotel-madinah.store');
Route::put('/admin/hotel-madinah', [HotelMadinahController::class, 'update'])->name('admin.hotel-madinah.update');
Route::delete('/admin/hotel-madinah/{id}', [HotelMadinahController::class, 'destroy'])->name('admin.hotel-madinah.delete');

Route::get('/admin/bahan-mentah', [BahanMentahController::class, 'index'])->name('admin.bahan-mentah');
Route::post('/admin/bahan-mentah', [BahanMentahController::class, 'store'])->name('admin.bahan-mentah.store');
Route::put('/admin/bahan-mentah', [BahanMentahController::class, 'update'])->name('admin.bahan-mentah.update');
Route::delete('/admin/bahan-mentah', [BahanMentahController::class, 'destroy'])->name('admin.bahan-mentah.delete');

Route::get('/admin/supplier', [SupplierController::class, 'index'])->name('admin.supplier');
Route::post('/admin/supplier', [SupplierController::class, 'store'])->name('admin.supplier.store');
Route::put('/admin/supplier', [SupplierController::class, 'update'])->name('admin.supplier.update');
Route::delete('/admin/supplier/{id}', [SupplierController::class, 'destroy'])->name('admin.supplier.delete');

Route::get('/admin/hasil-produksi', [HasilProduksiController::class, 'index'])->name('admin.hasil-produksi');
Route::post('/admin/hasil-produksi', [HasilProduksiController::class, 'store'])->name('admin.hasil-produksi.store');
Route::put('/admin/hasil-produksi', [HasilProduksiController::class, 'update'])->name('admin.hasil-produksi.update');
Route::delete('/admin/hasil-produksi', [HasilProduksiController::class, 'destroy'])->name('admin.hasil-produksi.delete');

Route::get('/admin/paket-umrah', [PaketUmrahController::class, 'index'])->name('admin.paket-umrah');
Route::post('/admin/paket-umrah', [PaketUmrahController::class, 'store'])->name('admin.paket-umrah.store');
Route::put('/admin/paket-umrah', [PaketUmrahController::class, 'update'])->name('admin.paket-umrah.update');
Route::delete('/admin/paket-umrah', [PaketUmrahController::class, 'destroy'])->name('admin.paket-umrah.delete');