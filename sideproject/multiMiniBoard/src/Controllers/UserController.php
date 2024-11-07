<?php

namespace Controllers;;

use Controllers\Controller;
use Lib\UserValidator;
use Models\User;

class UserController extends Controller
{
    protected $userInfo = [
        'u_email' => '',
        'u_name' => ''
    ];

    protected function goLogin(){
        return 'login.php';
    }

    protected function login(){
        //유저 입력 정보를 획득
        $requestData = [
            'u_email' => $_POST['u_email'],
            'u_password' => $_POST['u_password']
        ];
        //유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if (count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return 'login.php';
        }

        // //비밀번호 암호화
        // $encyptPassword = password_hash($requestData['u_password'],PASSWORD_DEFAULT);
        // password_verify('12345','암호화된 문자열');

        //유저정보 획득
        $userModel = new User;
        $prepare = [
            'u_email' => $requestData['u_email']
        ];
        $resultUserInfo = $userModel->getUserInfo($prepare);

        // var_dump($resultUserInfo);
        // var_dump(password_hash($requestData['u_password'],PASSWORD_DEFAULT));
        // exit;

        //유저 존재 유무 체크
        if (!$resultUserInfo) {   //false일 때 에러처리가 되도록 함
            $this->arrErrorMsg[] = '존재하지 않는 유저입니다';
            return 'login.php';
        } else if (!password_verify($requestData['u_password'], $resultUserInfo['u_password'])) {
            //패스워드 체크
            $this->arrErrorMsg[] = '패스워드가 일치하지 않습니다';
            return 'login.php';
        }

        //세션에 u_id저장
        $_SESSION['u_id'] = $resultUserInfo['u_id'];        
        $_SESSION['u_email'] = $resultUserInfo['u_email'];

        //로케이션 처리
        return 'Location: /boards';
    }
    public function logout(){
        unset($_SESSION['u_id']); //유저 아이디 제거
        unset($_SESSION['u_email']); //유저 이메일 제거
        session_destroy(); //세션 파괴

        //login으로 갈 수 있도록 록케이션 처리
        return 'Location: /login';
    }

    public function goRegist(){
        return 'regist.php';
    }

    // 회원가입 처리
    public function regist(){
        $requestData = [
            'u_email' => isset($_POST['u_email']) ? $_POST['u_email'] : '',
            'u_password' => isset($_POST['u_password']) ? $_POST['u_password'] : '',
            'u_password_chk' => isset($_POST['u_password_chk']) ? $_POST['u_password_chk'] : '',
            'u_name' => isset($_POST['u_name']) ? $_POST['u_name'] : ''
        ];

        $this->userInfo = [
            'u_email' => $requestData['u_email'],
            'u_name' => $requestData['u_name']
        ];

        $resultValidator = UserValidator::chkValidator($requestData);
        if (count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return 'regist.php';
        }
        // 이메일 중복체크
        $userModel = new User();
        $prepare = [
            'u_email' => $requestData['u_email']
        ];
        $resultUserInfo = $userModel->getUserInfo($prepare);
        if ($resultUserInfo) {
            $this->arrErrorMsg[] = '이미 가입된 이메일 입니다';
            return 'regist.php';
        }

        // 회원정보 인서트
        $userModel->beginTransaction();
        $prepare = [
            'u_email' => $requestData['u_email'],
            'u_password' => password_hash($requestData['u_password'], PASSWORD_DEFAULT),
            'u_name' => $requestData['u_name']
        ];
        $resultRegistUserInfo = $userModel->registUserInfo($prepare);
        if ($resultRegistUserInfo !== 1) {
            $userModel->rollBack();
            $this->arrErrorMsg[] = '회원가입에 실패했습니다';
            return 'regist.php';
        }
        $userModel->commit();
        return 'Location: /login';
    }
}
