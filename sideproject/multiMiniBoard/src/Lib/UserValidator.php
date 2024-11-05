<?php

namespace Lib;
class UserValidator{
    public static function chkValidator(array $data){
        $arrErrorMsg = [];

        //패턴 생성
        $patternEmail = "/^[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}@[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}\.[a-zA-Z]{2,3}$/u";
        $patternPassword = "/^[a-zA-Z0-9!@]{8,20}$/u";
        $patternName = "/^[가-힣]{1,50}$/u";

        //이메일 체크
        if(array_key_exists('u_email',$data)){
            if(preg_match($patternEmail,$data['u_email'],$matches)===0){
                $arrErrorMsg[]='이메일 형식이 맞지 않습니다';
            }
        }

        //패스워드 체크
        if(array_key_exists('u_pw',$data)){
            if(preg_match($patternPassword, $data['u_pw'],$matches)===0){
                $arrErrorMsg[] = '비밀번호는 영어 대소문자 및 숫자, 특수 문자(!,@) 8~20자로 작성해 주세요';
            }
        }

        //패스워드 확인 체크
        if(array_key_exists('u_pw_chk',$data)){
            if($data['u_pw'] !== $data['u_pw_chk']){
                $arrErrorMsg[] = '입력한 비밀번호가 일치하지 않습니다';
            }
        }

        //이름체크
        if(array_key_exists('u_name',$data)){
            if(preg_match($patternName,$data['u_name'],$matches)===0){
                $arrErrorMsg[] = '이름은 한글만 입력해 주세요';
            }
        }


        return $arrErrorMsg;
    }
}