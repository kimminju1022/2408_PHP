<?php

//구구단 [ 2 x 1 =2 ]형식으로 작성하기
//배열로 만들면 되지 않을까?
//근데 어떻게??
//dan으로 2~9까지 단을 선언하고 foreach로 단을 반복하게 한다
// for문으로 1~9까지 곱하게 한다

// $dans = array(2,3,4,5,6,7,8,9);
// foreach($dans as $dan=>$gugudan)
//     $i++;
//     for($i=1; $i<9; $i++) {

// }
// echo $dan." x ".$i." = ".$dan*$i;

// $dan = array($i=2, $i<10, $i++);

// $dan = null;

// foreach($dans as $dan){

// }
// ----------function 
// 함수란? 매개변수에 일정값을 넣었을 때 12:56 시점 영상 듣기
// 코드 중복을 제거
// 즉, 모듈화를 하기 위해서 이다

// 두 수를 더해서 반환하는 함수
// function my_sum(int $num1, int $num2 =10){
//     return $num1+$num2;
// };
// echo my_sum(9,4);
// ----------예외처리
// try{
//     // 처리하고자 하는 로직
//     5 / 0;
// } catch(Throwable $th){
//     // 예외 발생 시 할 처리
//     echo $th->getMessage();
// } finally {
//     //예외 발생여부와 상관 없이 항상 실행 할 처리
//     echo " finally";
// }
// echo " 처리끝";

// try{
//     echo "바깥쪽 try\n";
//     try {
//         5 / 0;
//         echo "안쪽 try\n"   ;
//     }catch(Throwable $th){
//         echo "안쪽 catch\n"   ;
//         5 / 0;
//     }
// } catch(Throwable $th){
//     echo "바깥쪽 catch\n";
// }
// ---------강제 예외 발생
// try{
//     throw new Exception("강제예외발생");
// }catch(Throwable $th) {
//     echo $th->getMessage();
// }

//---------데이터 캐스팅
// int를 string으로
$num = 1;
var_dump((string)$num);