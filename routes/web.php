<?php

use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\PenyediaBeasiswaController;
use App\Http\Controllers\ProsesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ExportController;

Route::get('/', [DataController::class, 'index'])->name('index');
Route::get('/login', [SesiController::class, 'index'])->name('login');
Route::post('/login', [SesiController::class, 'show']);
Route::get('/register', [SesiController::class, 'create'])->name('register');
Route::post('/register', [SesiController::class, 'store']);
Route::post('/logout', [SesiController::class, 'destroy'])->name('logout');

Route::get('/index', [DataController::class, 'index'])->middleware('auth')->name('index');

Route::resource('beasiswa', BeasiswaController::class)->middleware('role:admin,admin1');
Route::resource('penyediabeasiswa', PenyediaBeasiswaController::class)->middleware('role:admin,admin1');
Route::resource('pendaftar', PendaftarController::class)->middleware('role:admin');
Route::resource('proses', ProsesController::class)->middleware('role:admin,admin1,user');

Route::get('export/pendaftar', [ExportController::class, 'pendaftar'])->middleware('role:admin,admin1')->name('export.pendaftar');
Route::get('export/beasiswa', [ExportController::class, 'beasiswa'])->middleware('role:admin,admin1')->name('export.beasiswa');
Route::get('export/penyediabeasiswa', [ExportController::class, 'penyediabeasiswa'])->middleware('role:admin,admin1')->name('export.penyediabeasiswa');
Route::get('export/proses', [ExportController::class, 'proses'])->middleware('role:admin,admin1')->name('export.proses');
