<?php

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
// 서버사이드 랜더링할 때 많이 쓰이는 것 [1107 12:53영상 참조] 

Route::get('/', function () {
    return view('welcome');
});

/**라우트 정의 방법
 * 1. 라우트 객체를 이용한다
 */
