<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Auth;

Route::get('/login', [LoginController::class, 'showlogin'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin']);
Route::get('/postlogout', [LoginController::class, 'postlogout']);
Route::middleware(['auth'])->group(function () {

Route::get('/', [DashboardController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'create']);
Route::post('/user/simpan', [UserController::class, 'store']);
Route::get('/user/show/{id}', [UserController::class, 'show']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/delete/{id}', [UserController::class, 'destroy']);

Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang/tambah', [BarangController::class, 'create']);
Route::post('/barang/simpan', [BarangController::class, 'store']);
Route::get('/barang/show/{id}', [BarangController::class, 'show']);
Route::post('/barang/update/{id}', [BarangController::class, 'update']);
Route::get('/barang/delete/{id}', [BarangController::class, 'destroy']);

Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::get('/penjualan/tambah', [PenjualanController::class, 'create']);
Route::get('/penjualan/transaksi/{id}', [PenjualanController::class, 'transaksi']);
Route::post('/penjualan/update/{id}', [PenjualanController::class, 'update']);
ROute::get('/penjualan/struk/{id}', [PenjualanController::class, 'cetak']);
ROute::get('/penjualan/detail/{id}', [PenjualanController::class, 'show']);

Route::post('/penjualan/scan', [DetailPenjualanController::class, 'store']);
// Route::get('/penjualan/show/{id}', [PenjualanController::class, 'show']);
Route::get('/detailpenjualan/delete/{nobon}/{id_barang}', [DetailPenjualanController::class, 'destroy']);

Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/pelanggan/tambah', [PelangganController::class, 'create']);
ROute::post('/pelanggan/simpan', [PelangganController::class, 'store']);
Route::get('/pelanggan/delete/{id}', [PelangganController::class, 'destroy']);
Route::post('/pelanggan/update/{id}', [PelangganController::class, 'update']);
Route::get('/pelanggan/show/{id}', [PelangganController::class, 'show']);

});
