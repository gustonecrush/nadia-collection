<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\BahanMentahController;
use App\Http\Controllers\BahanMentahProduksiController;
use App\Http\Controllers\HasilProduksiController;
use App\Http\Controllers\HotelMadinahController;
use App\Http\Controllers\HotelMekahController;
use App\Http\Controllers\PaketUmrahController;
use App\Http\Controllers\PesawatController;
use App\Http\Controllers\SupplierController;
use App\Models\HasilProduksi;
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
    $hasilProduksis = HasilProduksi::all();
    return view('index', compact('hasilProduksis'));
})->name('index');

Route::get('/admin/export/suppliers', [AdminDashboardController::class, 'exportSuppliers'])->name('admin.export.suppliers');
Route::get('/admin/export/raw-materials', [AdminDashboardController::class, 'exportRawMaterials'])->name('admin.export.raw_materials');
Route::get('/admin/export/production-results', [AdminDashboardController::class, 'exportProductionResults'])->name('admin.export.production_results');


Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/dashboard/data', [AdminDashboardController::class, 'getData'])->name('admin.dashboard.data');
Route::get('/admin/admins', [AdminDashboardController::class, 'index'])->name('admin.admins');
Route::post('/admin/admins', [AdminDashboardController::class, 'store'])->name('admin.admins.store');
Route::put('/admin/admins', [AdminDashboardController::class, 'update'])->name('admin.admins.update');
Route::delete('/admin/admins', [AdminDashboardController::class, 'destroy'])->name('admin.admins.delete');


Route::get('/admin/login', [AdminAuthController::class, 'index']);
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin/bahan-mentah', [BahanMentahController::class, 'index'])->name('admin.bahan-mentah');
Route::post('/admin/bahan-mentah', [BahanMentahController::class, 'store'])->name('admin.bahan-mentah.store');
Route::put('/admin/bahan-mentah', [BahanMentahController::class, 'update'])->name('admin.bahan-mentah.update');
Route::delete('/admin/bahan-mentah', [BahanMentahController::class, 'destroy'])->name('admin.bahan-mentah.delete');

Route::get('/admin/supplier', [SupplierController::class, 'index'])->name('admin.supplier');
Route::post('/admin/supplier', [SupplierController::class, 'store'])->name('admin.supplier.store');
Route::put('/admin/supplier', [SupplierController::class, 'update'])->name('admin.supplier.update');
Route::delete('/admin/supplier/{id}', [SupplierController::class, 'destroy'])->name('admin.supplier.delete');

Route::get('/admin/hasil-produksi', [HasilProduksiController::class, 'index'])->name('admin.hasil-produksi');
Route::get('/admin/hasil-produksi/{id}', [HasilProduksiController::class, 'detail'])->name('admin.hasil-produksi.detail');
Route::post('/admin/hasil-produksi', [HasilProduksiController::class, 'store'])->name('admin.hasil-produksi.store');
Route::put('/admin/hasil-produksi', [HasilProduksiController::class, 'update'])->name('admin.hasil-produksi.update');
Route::delete('/admin/hasil-produksi', [HasilProduksiController::class, 'destroy'])->name('admin.hasil-produksi.delete');

Route::post('/admin/bahan-hasil-produksi', [BahanMentahProduksiController::class, 'store'])->name('admin.bahan-hasil-produksi.store');
Route::put('/admin/bahan-hasil-produksi', [BahanMentahProduksiController::class, 'update'])->name('admin.bahan-hasil-produksi.update');
Route::delete('/admin/bahan-hasil-produksi', [BahanMentahProduksiController::class, 'destroy'])->name('admin.bahan-hasil-produksi.delete');