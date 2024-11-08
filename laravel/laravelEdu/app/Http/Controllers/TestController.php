<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LDAP\Result;

class TestController extends Controller
{
    //actiom method 만들기
    public function index(){
        // return '테스트 인덱스';
        $result = '홍길동';

        return view('test')
                ->with('name',$result);

    } //라우트 웹에 연결
}
