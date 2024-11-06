<?php

namespace Controllers;

use Models\BoardsCategory;
use Lib\Auth;

class Controller
{
    protected $arrErrorMsg = [];  //화면에 표시할 에러 메세지 리스트
    protected $arrBoardNameInfo = []; //헤더 게시판 드롭다운 리스트

    //생성자
    public function __construct(string $action)
    {
        //세션시작
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        //유저 로그인 및 권한체크
        Auth::chkAuthorization();

        //헤더 드롭다운 리스트 획득
        $boardsCategoryModel = new BoardsCategory();
        $this->arrBoardNameInfo = $boardsCategoryModel->getBoardsNameList();


        //해당 action호출 [ex- /login으로 get을 오면 페이지 이동이 되는데 이런 활동을 action이라 함]
        $resultAction = $this->$action();
        // echo $resultAction;

        //view호출
        $this->callView($resultAction);

        exit; //php 처리 종료
    }

    //뷰 or 로케이션 처리용 메소드
    private function callView($path)
    {
        if (strpos($path, 'Location:') === 0) {
            header($path);
        } else {
            require_once(_PATH_VIEW . '/' . $path);
        }
    }
}
