<?php
namespace Controllers;
class Controller{
public function __construct(string $action){
    //세션시작

    //유저 로그인 및 권한체크

    //해당 action호출 [ex- /login으로 get을 오면 페이지 이동이 되는데 이런 활동을 action이라 함]
    $resultAction = $this->$action();
    // echo $resultAction;
    //view호출
    $this->callView($resultAction);
   
    exit; //php 처리 종료
}

//뷰 or 로케이션 처리용 메소드
private function callView($path){
    if(strpos($path,'Location:') === 0){
        header($path);
    }else {
        require_once(_PATH_VIEW.'/'.$path);
    }
}
}