<?php

use App\Http\Controllers\DetailControllers;
use App\Http\Controllers\HomeControllers;
use App\Http\Controllers\KategoriControllers;
use Illuminate\Support\Facades\Route;

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
    return view('Home.dashboard');
});

Route::prefix('kategori')->group(function () {
    Route::get('/list_kategori/{id}/{query}/{kategori}', [KategoriControllers::class, 'list_kategori']);
});

Route::prefix('detail')->group(function () {
    Route::get('/detail_barang/{id}', [DetailControllers::class, 'detail_barang']);
});

Route::get('/login', [HomeControllers::class, 'login']);
Route::get('/about', [HomeControllers::class, 'about']);
Route::get('/contact', [HomeControllers::class, 'contact']);
