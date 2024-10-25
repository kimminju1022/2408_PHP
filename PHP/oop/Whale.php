<?php
namespace PHP\oop;

require_once('./Mammal.php');
require_once('./Swim.php');
//mammal의 주소적어줌으로써 하위에 적힌 mammal의 주소에서 가져오게 함
use PHP\oop\Mammal;
use PHP\oop\Swim;

//상속과 추상
class Whale extends Mammal implements Swim{
    //수영 매소드
    public function swimming(){
        return "수영합니다. ";
    }
    
    public function printInfo(){
        return "고래고래고래 ";
    }
}


    // private $name;
    // private $residence;

    // //생성자
    // public function __construct($name, $residence){
    //     $this->name = $name;
    //     $this->residence = $residence;
    // }
    // //정보 출력
    // public function printInfo() {
    //     return $this->name.'가'.$this->residence.'에 삽니다. ';        
    // }



// class Whale{   
//     // 외부에서 접근하는 기능이 있는 경우를 위해 퍼블릭이 있다, 만일 막고 싶으면 프라이빗과 * 있다
//     //프로퍼티
//     public $name="고래";
//     private $age = 20;


//     // construct(생성자)
//     public function __construct($name, $age) {
//         $this->name = $name;
//         $this->age = $age;
//     }

//     //method 
//     public function breath(){
//         return"숨을 쉽니다";
//     }

//     public function printInfo(){
//         return $this->name."는".$this->age."살 입니다.";
//     }

//     //getter / setter method
//     public function getAge(){
//         return $this->age;
//     }
//     public function setAge($age){
//         $this->age = $age;
//     }
    
//     //static method - 인스턴스화 없이도 가능
//     public static function dance() {
//         return '고래가 춤을 춥니다. ';
//     }
// }
// echo Whale::dance();


//인스턴스화 하는 방법은 ! new !
// $whale = new Whale("핑크고래",40);
// echo $whale->printInfo();

// echo $whale->name;
// echo $whale->printInfo();
// echo $whale->getAge();
// $whale2->setAge(30);
// echo $whale2->getAge();

