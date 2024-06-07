<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PengurusController;
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
Route::get('/index', function () {
    return view('template/index');
})->name('index');


//route login
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/index', [AuthController::class, 'index'])->name('index');
Route::get('/program', [AuthController::class, 'program'])->name('program');
Route::get('/berita', [AuthController::class, 'berita'])->name('berita');
Route::get('/galerii', [AuthController::class, 'galerii'])->name('galerii');
Route::get('show/{id}', [AuthController::class, 'show'])->name('show');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');



Route::resource('guru', GuruController::class)->middleware('auth');
Route::resource('pengurus', PengurusController::class)->middleware('auth');
Route::resource('kelas', KelasController::class)->middleware('auth');
Route::resource('pengumuman', PengumumanController::class)->middleware('auth');
Route::resource('kegiatan', KegiatanController::class)->middleware('auth');
Route::resource('prestasi', PrestasiController::class)->middleware('auth');
Route::resource('sekolah', SekolahController::class)->middleware('auth');
Route::resource('galeri', GaleriController::class)->middleware('auth');

// Route::post('/upload-file',  [FileController::class, 'uploadFile'])->name('upload-file');
