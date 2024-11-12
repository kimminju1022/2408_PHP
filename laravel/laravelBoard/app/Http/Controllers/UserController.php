<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function goLogin(){
        // 여기선 블레이드 템플릿 이름을 사용한다
        return view('login');
    }
}
