<?php

use Illuminate\Http\Request;
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
 * 1. 라우트 객체를 이용한다[특정url을 받아왔을 때  사용]
 *      [elseif없이 작성 가능 ::썻지만 스태틱메소드가 아니다 아닌걸 그냥 쉽게할려고 쓴것일 뿐]
 */

Route::get('/hi', function () {
    return '안녕하세요';
});


Route::get('/hello', function () {
    return 'hello';
});

Route::get('/myview', function () {
    return view('myView');
});

//  httpMethod에 대응하는 라우터[이걸 작동하기 위해 home.blade.php파일 작성_이름 잘 적어주기]
Route::get('/home', function () {
    return view('home');
});

Route::post('/home', function () {
    return 'HOME POST';
});

Route::put('/home', function () {
    return 'HOME PUT';
});

Route::delete('/home', function () {
    return 'HOME DELETE';
});

Route::patch('/home', function () {
    return 'HOME PATCH';
});


// 파라미터 제어방법 클라이언트가 우리에게 데이터를 전하는 것을 뜻함
// 파라미터를 받은 라우터
Route::get('/param', function (Request $request) {
    return 'ID : ' . $request->id . ' NAME : ' . $request->name;
});

// 세그먼트 파라미터
// http::/localhost:8000/param/1 여기서 이름붙이려면 [,$name ]해주면 된다
Route::get('/param/{id}/{name}', function ($id, $name) {
    return $id . '  :  ' . $name;
});
Route::get('/param/{id}', function (Request $request) {
    return $request->id;
});

Route::get('/param2/{id}', function (Request $request, $id) {
    return $request->id . "  " . $id;
});

// 세그먼트 파라미터의 디폴트 설정
Route::get('/param3', function () {
    return '파람3입니다';
});

Route::get('/param3/{id?}', function ($id = 0) {
    return $id;
});

//라우트명 지정 [블레이드 탬플릿 필요 네임블레이드 생성]
Route::get('/name', function () {
    return view('name');
});

Route::get('/home/na/hon/php', function () {
    return '좀 긴 패스';
})->name('long');

//뷰에 데이터 전달하는 방법[샌드블레이드생성] local에서 id를 입력받은 값으로 할려면request를 작성해야한다
// {$id} request"id"로 값을 받도록 만들어 주면 니가 생각했던 패턴대로 받아올 수 있어~
Route::get('/send', function () {
    $result = [
        ['id'=>1, 'name'=>'길동']
        ,['id'=>2, 'name'=>'갑이']  
    ];
    // return view('send')
    //     ->with('gender', '무성')
    //     ->with('data', $result);
    // 아래위결과 는 같음
    return view('send')
    ->with([
        'gender'=>'무성'
        ,'data'=> $result
    ]);
});

// 대체 라우트 4:36
Route::fallback(function () {
    return '이상한 url입니다';
});

// 라우트 그룹[]

// Route::get('/users', function () {
//     return 'GET : /users';
// });
// Route::post('/users', function () {
//     return 'POST : /users';
// });
// Route::put('/users/{id}', function () {
//     return 'PUT : /users';
// });
// Route::delete('/users/{id}', function () {
//     return 'DELETE : /users';
// });
// 위에 4개를 그룹화시키는 작업 prefix로 그룹화 한다
Route::prefix('/users')->group(function(){ 
    Route::get('/', function () {
        return 'GET : /users';
    });
    Route::post('/users', function () {
        return 'POST : /users';
    });
    Route::put('/users/{id}', function () {
        return 'PUT : /users';
    });
    Route::delete('/users/{id}', function () {
        return 'DELETE : /users';
    });
});
// Route::prefix('/users')->group(function(){ 
//     Route::get('/', function () {
//         return 'GET : /users';
//     });
// });