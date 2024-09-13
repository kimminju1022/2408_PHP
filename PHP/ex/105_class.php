<?php

/**어렵데...그냥 막 어려운 거니까 시간 좀 더 들여 공부해도 안이상한거야 좌절하지마

 *  require_once설명 다시듣고 이해하기!!!!!!!!!!!!!! */

// class whale {

//     //메소드(method)
//     function breath(){
//         echo "숨을 쉽니다";
//     }
// }

// require_once("./Whale.php");
// //[ 인스턴스화 ] 작업을 거쳐야 메소드를 불러올 수 있다
// $whale = new whale();

// //class method사용
// $whale -> breath();

// echo $whale->name."\n";    //public이므로 접근 가능
// echo $whale->info();     //private이므로 접근 불가

// static맴버에 접근 방법
// whale::myStatic();
// 영상 다시보기


require_once("./Shark.php");

// 상어클래스
$shark = new Shark("상어");
echo $shark->name;