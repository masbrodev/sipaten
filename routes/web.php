<?php

use App\Http\Controllers\BerkasClaimController;
use App\Http\Controllers\BerkasUsulanController;
use App\Http\Controllers\BmnController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\PaguController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UsulanController;
use Illuminate\Support\Facades\Auth;
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
    return redirect(route('login'));
});

Route::resource('bmn', BmnController::class);
Route::resource('claim', ClaimController::class);
Route::resource('usulan', UsulanController::class);
Route::resource('pagu', PaguController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('cberkas', BerkasClaimController::class);
Route::resource('uberkas', BerkasUsulanController::class);
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
