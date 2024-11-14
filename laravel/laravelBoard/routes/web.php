<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
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
    // return view('welcome');
    return redirect()->route('goLogin');
});
Route::get('/login',[UserController::class,'goLogin'])->name('goLogin');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/logout',[UserController::class,'logout'])->name('logout');


//게시판관련
Route::middleware('auth')->resource('/boards',BoardController::class)->except(['update','edit']);
// Route::resource('/boards',BoardController::class)->except(['update','edit']);