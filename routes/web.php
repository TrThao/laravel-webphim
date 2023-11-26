<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;

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

Route::get('/', [IndexController::class, 'home'])->name('homepage');


Route::get('/danh-muc/{slug}', [indexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}', [indexController::class, 'genre'])->name('genre');
Route::get('quoc-gia/{slug}', [indexController::class, 'country'])->name('country');


Route::get('/phim/{slug}', [indexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}', [indexController::class, 'watch']);
Route::get('/so-tap', [indexController::class, 'episode'])->name('so-tap');

Route::get('/nam/{year}', [indexController::class, 'year']);
Route::get('/tag/{tag}', [indexController::class, 'tag']);

Route::get('/tim-kiem', [indexController::class, 'timkiem'])->name('tim-kiem');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//route Admin
Route::resource('category', CategoryController::class);
Route::post('resorting', [CategoryController::class, 'resorting'])->name('resorting');
Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('movie', MovieController::class);
Route::resource('episode', EpisodeController::class);
Route::get('select-movie', [EpisodeController::class,'select_movie'])->name('select-movie');

Route::get('/update-year-phim', [MovieController::class, 'update_year']);
Route::get('/update-topview-phim', [MovieController::class, 'update_topview']);
Route::get('/filter-topview-phim', [MovieController::class, 'filter_topview']);
Route::get('/filter-topview-default', [MovieController::class, 'filter_default']);

Route::get('/update-season-phim', [MovieController::class, 'update_season']);