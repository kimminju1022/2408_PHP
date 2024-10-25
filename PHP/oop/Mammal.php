<?php
// require_once('./Mammal.php');
namespace PHP\oop;  //mammal의 주소

// ------------------------추상클래스
abstract class Mammal{
    private $name;
    private $residence;


//  생성자
    public function __construct($name, $residence){
        $this->name = $name;
        $this->residence = $residence;
    }
    
    //추상 메소드
    abstract public function printInfo();
}








// class Mammal{
//     private $name;
//     private $residence;

//     //생성자
//     public function __construct($name, $residence){
//         $this->name = $name;
//         $this->residence = $residence;
//     }
//      //정보 출력
//     // final
//     public function printInfo() {
//         return $this->name.'가'.$this->residence.'에 삽니다. ';        
//     }
// }