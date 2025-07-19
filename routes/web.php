<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\VideoController;
use App\Models\Video;
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

Route::get('/foto', [PhotoController::class, 'galeriFrontend']);

Route::controller(\App\Http\Controllers\AuthController::class)->group(function() {
    Route::get('/login', 'index')->middleware('guest')->name('login');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
    
    // Route::get('/register', 'showRegistrationForm')->middleware('guest')->name('register');
    // Route::post('/register', 'register');
    // Route::get('/registration-success', [AuthController ::class, 'showRegistrationSuccess'])->name('registration.success');
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

Route::get('/video', [VideoController::class, 'videoFrontend']);
Route::middleware('auth')->controller(\App\Http\Controllers\VideoController::class)->group(function () {
    Route::get('/videos', 'index')->name('videos');
    Route::post('/videos/store', 'store')->name('videos.store');
    Route::post('/videos/update/{id}', 'update')->name('videos.update');
    Route::post('/videos/destroy/{id}', 'destroy')->name('videos.destroy');
});

// ROUTE FRONTEND - untuk pengunjung (tanpa login)
Route::get('/program', [ProgramController::class, 'programFrontend'])->name('programs');

Route::middleware('auth')->controller(\App\Http\Controllers\ProgramController::class)->group(function () {
    Route::get('/programs', 'index')->name('programs');
    Route::post('/programs/store', 'store')->name('programs.store');
    Route::post('/programs/update/{id}', 'update')->name('programs.update');
    Route::post('/programs/destroy/{id}', 'destroy')->name('programs.destroy');
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

//Membership
Route::get('/syarat_member', function () {
    return view('membership.syarat');
});
// Route::get('/daftar_member', function () {
//     return view('membership.daftar');
// });
Route::get('/best_skor', function () {
    return view('membership.best_skor');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk pendaftaran member
Route::prefix('membership')->group(function () {
    Route::get('/daftar', function () {return redirect()->route('daftar');});
    Route::get('/membership.daftar', [MemberController::class, 'create'])->name('membership.daftar');
    Route::post('/membership.store', [MemberController::class, 'store'])->name('membership.store');
    Route::get('terima-kasih', function () {return view('membership.thankyou');})->name('membership.thankyou');
});

// Route admin untuk mengelola member
Route::get('/members', [MemberController::class, 'videoFrontend']);
Route::middleware('auth')->controller(\App\Http\Controllers\MemberController::class)->group(function () {
    Route::get('/members', 'index')->name('members');
    Route::post('/members/store', 'store')->name('members.store');
    Route::post('/members/update/{id}', 'update')->name('members.update');
    Route::post('/members/destroy/{id}', 'destroy')->name('members.destroy');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->controller(MemberController::class)->group(function () {
    Route::get('/members', 'index')->name('members.index');
    Route::get('/members/create', 'create')->name('members.create');
    Route::post('/members', 'store')->name('members.store');
    Route::get('/members/{member}', 'show')->name('members.show');
    Route::get('/members/{member}/edit', 'edit')->name('members.edit');
    Route::put('/members/{member}', 'update')->name('members.update');
    Route::delete('/members/{member}', 'destroy')->name('members.destroy');
});


