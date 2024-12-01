<?php

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
    Route::get('/login', 'index')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
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

