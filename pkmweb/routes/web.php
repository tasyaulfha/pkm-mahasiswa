<?php

use App\Http\Controllers\Mahasiswa\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

//middleware supaya ga balik ke halaman home after logout
Route::group(['middleware' => 'prevent-back-history'],function(){
    Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/// arahkan ke link ini ketika user klik "login with google"
Route::get('auth/google', [App\Http\Controllers\Auth\LoginController::class, 'google']);
/// siapkan route untuk menampung callback dari google
Route::get('auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'google_callback']);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('auth/google', [App\Http\Controllers\Auth\LoginController::class, 'google']);
    Route::get('auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'google_callback']);
});

// route pkm internal untuk mahasiswa
Route::get('/mahasiswa.internal', [App\Http\Controllers\Mahasiswa\InternalController::class, 'index']);

// route pkm camp untuk mahasiswa
Route::get('/mahasiswa.camp', [App\Http\Controllers\Mahasiswa\CampController::class, 'index']);

// route pkm idea challenge untuk mahasiswa
Route::get('/mahasiswa.idea', [App\Http\Controllers\Mahasiswa\IdeaController::class, 'index']);

// route tambah untuk mahasiswa
Route::get('/tambah', [App\Http\Controllers\Mahasiswa\TambahController::class, 'index']);


Route::get('/mahasiswa.daftar', [App\Http\Controllers\HomeController::class, 'daftar']);

Route::resource('posts', '\App\Http\Controllers\HomeController');

// Route::resource('posts', '\App\Http\Controllers\Mahasiswa\PostController');

//akses /admin
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
        ->name('dashboard');
     Route::resource('usulan', 'UsulanController');
     Route::resource('skema', 'SkemaController');



    });

