<?php
namespace PHP\oop;

require_once('./Mammal.php');
require_once('./Pet.php');

use PHP\oop\Mammal;
use PHP\oop\Pet;

class FlyingSquirrel extends Mammal implements Pet{

    //비행 매소드
    public function flying() {
        return "날아갑니다";
    }

    //오버라이딩
    public function printInfo(){
        return "룰루랄라";
        // return parent::printInfo()."룰루랄라";
        // 부모클래스에 붙을때는 스태틱인것 처럼 붙어야 함
    }
    
    public function printPet(){
        return "펫입니다 찍찍";
    }
        
    }


    // private $name;
    // private $residence;

    // //생성자
    // public function __construct($name, $residence){
    //     $this->name = $name;
    //     $this->residence = $residence;
    // }
    //  //정보 출력
    //  public function printInfo() {
    //     return $this->name.'가'.$this->residence.'에 삽니다. ';        
    // }

