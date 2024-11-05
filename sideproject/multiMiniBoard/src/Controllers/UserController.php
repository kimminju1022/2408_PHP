<?php

namespace Controllers;;

use Controllers\Controller;
use Lib\UserValidator;
use Models\User;

class UserController extends Controller{
    protected function goLogin(){
        return 'login.php';
    }

    protected function login(){
        //유저 입력 정보를 획득
        $requestData = [
            'u_email' => $_POST['u_email']
            ,'u_pw' => $_POST['u_pw']
        ];

        //유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0){
            $this -> arrErrorMsg = $resultValidator;
            return 'login.php';
        }
        
        // //비밀번호 암호화
        // $encyptPassword = password_hash($requestData['u_pw'],PASSWORD_DEFAULT);
        // password_verify('12345','암호화된 문자열');
        
        //유저정보 획득
        $userModel = new User;
        $prepare = [
            'u_email' => $requestData['u_email']
        ];
        $resultUserInfo = $userModel->getUserInfo($prepare);

        // var_dump($resultUserInfo);
        // var_dump(password_hash($requestData['u_pw'],PASSWORD_DEFAULT));
        // exit;
        
        //유저 존재 유무 체크
        if(!$resultUserInfo){   //false일 때 에러처리가 되도록 함
            $this->arrErrorMsg[] = '존재하지 않는 유저입니다';
            return 'login.php';
        }else if(!password_verify($requestData['u_pw'],$resultUserInfo['u_pw'])){
        //패스워드 체크
            $this->arrErrorMsg[] = '패스워드가 일치하지 않습니다';
            return 'login.php';
        }
        //세션에 u_id저장
        $_SESSION['u_email']=$resultUserInfo['u_email'];
        
        //로케이션 처리
        return 'Location: /boards';
    }
}