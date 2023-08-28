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
Route::get('/phim/{slug}', [IndexController::class, 'movie'])->name('home.movie');
Route::get('/xem-phim/{slug}/{episode}', [IndexController::class, 'watch'])->name('home.watch');
Route::get('/tap-phim', [IndexController::class, 'episode'])->name('home.episode');

Route::get('/nam/{year}', [IndexController::class, 'year'])->name('home.year');
Route::get('/tag/{tag}', [IndexController::class, 'tag'])->name('home.tag');
Route::get('/tim-kiem', [IndexController::class, 'search'])->name('home.search');


Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::resource('category', CategoryController::class);
    Route::post('category/resorting', [CategoryController::class, 'resorting'])->name('resorting');
    Route::resource('country', CountryController::class);

    Route::resource('episode', EpisodeController::class);
    Route::get('/select-movie', [EpisodeController::class, 'select_movie'])->name('select_movie');
    Route::get('/add-episode/{id}', [EpisodeController::class, 'add_episode'])->name('add_episode');

    Route::resource('genre', GenreController::class);

    Route::resource('movie', MovieController::class);
    Route::post('/update-year-movie', [MovieController::class, 'update_year'])->name('update_year');
    Route::get('/update-topview-movie', [MovieController::class, 'update_topview'])->name('update_topview');
    Route::post('/update-season-movie', [MovieController::class, 'update_season'])->name('update_season');

    Route::post('/filter-topview-movie', [MovieController::class, 'filter_topview'])->name('filter_topview');
    Route::get('/filter-topview-default', [MovieController::class, 'filter_default'])->name('filter_default');

    Route::resource('watch', WatchController::class);
});

Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    '\vendor\UniSharp\LaravelFilemanager\Lfm::routes()';
});


