<?php

namespace Route;

use Controllers\BoardController;
use Controllers\UserController;

// * 라우트 :  유저의 요청을 분석해서 해당 controller로 연결해 주는 클래스
class Route
{
    //생성자
    public function __construct()
    {

        $url = isset($_GET['url']) ? $_GET['url'] : ''; //요청경로 획득
        $httpMethod = $_SERVER['REQUEST_METHOD']; // http메소드 획득

        //요청 경로를 체크
        if ($url === '') {
            header('Location: /login');
            exit;
        } else if ($url === 'login') {
            //localhost/ login
            if ($httpMethod === 'GET') {
                new UserController('goLogin'); //인스턴스화 하였고 
            } else if ($httpMethod === 'POST') {
                new UserController('login'); //UserController를 사용
            }
        } else if ($url === 'boards') {
            if ($httpMethod === 'GET') {
                new BoardController('index');
            }
        } else if ($url === 'logout') {
            if ($httpMethod === 'GET') {
                new UserController('logout');
            }
        } else if ($url === 'regist') {
            if ($httpMethod === 'GET') {
                new UserController('goRegist');
            } else if ($httpMethod === 'POST') {
                new UserController('regist');
            }
        } else if ($url === 'boards/detail') {
            if ($httpMethod === 'GET') {
                new BoardController('show');
            }
        } else if ($url === 'boards/insert') {
            if ($httpMethod === 'GET') {
                new BoardController('create');
            } else if($httpMethod === 'post'){
                new BoardController('store');
            }
        }
    }
};
