<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\AlbumController as UserAlbumController;
use App\Http\Controllers\Admin\AlbumController as AdminAlbumController;
use App\Http\Controllers\User\ArtistController as UserArtistController;
use App\Http\Controllers\Admin\ArtistController as AdminArtistController;

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
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/home/artists', [App\Http\Controllers\HomeController::class, 'artistIndex'])->name('home.artist.index');

// Route::get('/index', [AdminAlbumController::class, 'index'])->name('index');
require __DIR__ . '/auth.php';
// Route::resource('/albums', AlbumController::class);

//Albums
Route::resource('/admin/albums', AdminAlbumController::class)->middleware(['auth'])->names('admin.albums');

Route::resource('/user/albums', UserAlbumController::class)->middleware(['auth'])->names('user.albums')->only(['index', 'show']);

//Artists
Route::resource('/admin/artists', AdminArtistController::class)->middleware(['auth'])->names('admin.artists');

Route::resource('/user/artists', UserArtistController::class)->middleware(['auth'])->names('user.artists')->only(['index', 'show']);





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
