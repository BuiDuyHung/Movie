<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\WatchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();


Route::get('/', [IndexController::class, 'index'])->name('home.index');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('home.category');
Route::get('/the-loai/{slug}', [IndexController::class, 'genre'])->name('home.genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('home.country');
Route::get('/phim', [IndexController::class, 'movie'])->name('home.movie');
Route::get('/xem-phim', [IndexController::class, 'watch'])->name('home.watch');
Route::get('/tap-phim', [IndexController::class, 'episode'])->name('home.episode');


Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::resource('category', CategoryController::class);
    Route::resource('country', CountryController::class);
    Route::resource('episode', EpisodeController::class);
    Route::resource('genre', GenreController::class);
    Route::resource('movie', MovieController::class);
    Route::resource('watch', WatchController::class);
});



