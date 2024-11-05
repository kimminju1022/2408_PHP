<?php

namespace Route;

use Controllers\BoardController;
use Controllers\UserController;

// * 라우트 :  유저의 요청을 분석해서 해당 controller로 연결해 주는 클래스
class Route{
    //생성자
    public function __construct(){

        $url = $_GET['url']; //요청경로 획득
        $httpMethod = $_SERVER['REQUEST_METHOD'];// http메소드 획득
        //요청 경로를 체크
        if($url === 'login'){
            //localhost/ login
            if($httpMethod ==='GET'){
                new UserController('goLogin'); //인스턴스화 하였고 
            }else if($httpMethod === 'POST'){
                new UserController('login'); //UserController를 사용
            }
        }else if($url === 'boards'){
            if($httpMethod === 'GET'){
                new BoardController('index');
            }
        }

        }
};