<?php
/** class :동종의 객체들을 모아 정의한 것
 * 관습적으로 파일명을 클래스명과 동일하게 명명한다*/
/**용어설명
 * 1. 접근제어 지시자
 *  - public : class 내/외부 어디에서나 접근 가능
 *  - private : class내부에서만 접근 가능(글씨 색도 다른것을 알 수 있다 비밀스러워)
 *  - protected : class 내부 및 상속관계에서 접근 가능(외부에서는 접근 불가)
 */

 class whale {
    /**  프로퍼티*/
    //접근제어 지시자 (↑ 1.)
    public $name = "고래";
    private $age = 30;
    protected $gender = 'm';
        

    /** 메소드(method)*/
    function breath(){
        echo "숨을 쉽니다"."\n";
    }

function info() {
    // $this : class 내의 프로퍼티나 메소드에 접근하기 위해 사용
    echo "나이는 ".$this->age."\n";
    }
    //static 메소드
    public static function myStatic(){
        echo "스태틱 메소드";
    }
 }