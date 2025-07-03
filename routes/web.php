<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilController;
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

Route::controller(\App\Http\Controllers\AppController::class)->group(function() {
    Route::get('/', 'index')->name('home');
    Route::get('/berita', 'berita')->name('berita');
    Route::get('/detail/{slug}', 'detail')->name('berita.detail');
});

Route::get('/foto', function () {
    return view('foto.foto');
});

Route::controller(\App\Http\Controllers\AuthController::class)->group(function() {
    Route::get('/login', 'index')->middleware('guest')->name('login');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
    
    Route::get('/register', 'showRegistrationForm')->middleware('guest')->name('register');
    Route::post('/register', 'register');
    Route::get('/registration-success', [AuthController ::class, 'showRegistrationSuccess'])
     ->name('registration.success');
});

Route::controller(\App\Http\Controllers\DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard')->middleware('auth');
    Route::get('/blog', function () {
        return view('admin.blog.index');
    });
});

Route::middleware('auth')->controller(\App\Http\Controllers\BlogController::class)->group(function () {
    Route::get('/blog', 'index')->name('blog');
    Route::get('/blog/create', 'create')->name('blog.create');
    Route::post('/blog/store', 'store')->name('blog.store');
    Route::get('/blog/edit/{id}', 'edit')->name('blog.edit');
    Route::post('/blog/update/{id}', 'update')->name('blog.update');
    Route::post('/blog/destroy/{id}', 'destroy')->name('blog.destroy');
});

Route::middleware('auth')->controller(\App\Http\Controllers\PhotoController::class)->group(function () {
    Route::get('/photo', 'index')->name('photo');
    Route::post('/photo/store', 'store')->name('photo.store');
    Route::post('/photo/update/{id}', 'update')->name('photo.update');
    Route::post('/photo/destroy/{id}', 'destroy')->name('photo.destroy');
});

Route::middleware('auth')->controller(\App\Http\Controllers\VideoController::class)->group(function () {
    Route::get('/video', 'index')->name('video');
    Route::post('/video/store', 'store')->name('video.store');
    Route::post('/video/update/{id}', 'update')->name('video.update');
    Route::post('/video/destroy/{id}', 'destroy')->name('video.destroy');
});

//Sejarah
Route::get('/sejarah', function () {
    return view('profil.sejarah');
});

// Route::prefix('admin')->middleware(['auth'])->group(function () {
//     Route::resource('sejarah', App\Http\Controllers\Admin\SejarahController::class)->names('admin.sejarah');
// });
// Route::middleware('auth')->controller(\App\Http\Controllers\SejarahController::class)->group(function () {
//     Route::get('/sejarah', 'index')->name('sejarah');
//     Route::get('/sejarah/create', 'create')->name('sejarah.create');
//     Route::post('/sejarah/store', 'store')->name('sejarah.store');
//     Route::get('/sejarah/edit/{id}', 'edit')->name('sejarah.edit');
//     Route::post('/sejarah/update/{id}', 'update')->name('sejarah.update');
//     Route::post('/sejarah/destroy/{id}', 'destroy')->name('sejarah.destroy');
// });


Route::get('/visi_misi', function () {
    return view('profil.visi_misi');
});
Route::get('/struktur_organisasi', function () {
    return view('profil.struktur_organisasi');
});

//Program
Route::get('/program', function () {
    return view('program.index');
});

//Membership
Route::get('/syarat_member', function () {
    return view('membership.syarat');
});
Route::get('/daftar_member', function () {
    return view('membership.daftar');
});
Route::get('/best_skor', function () {
    return view('membership.best_skor');
});

// Route::get('/skor', [App\Http\Controllers\SkorController::class, 'index'])->name('skor.bulanan');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

