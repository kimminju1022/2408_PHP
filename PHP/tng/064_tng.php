<?php
/** 로또번호 생성기
 * <규칙>
 * 1~45 까지 번호가 있다
 * 랜덤 번호 6개를 출력
 * 단, 번호는 중복되지 않는다
 * 
 * 코드 계획
 * 1 ~ 45 까지의 숫자를 담은 배열을 생성
 * 배열에 속한 수를 랜덤 추출
 * 추출된 값을 리턴하는 코드를 만들자!
 */

$lotto = array($rand_num,6);
$rand_num = range(1,45);
echo rand();


// foreach () {
//     if($rand2=array_diff($rand_num,array($rand1))); //


  
//         삭제실행
//         unset($target[$key]);

// // if($rand2 == $rand1)
// while($rand_num){
//     echo $rand_num;
//     break;
// }


// foreach($rand_num as $rand1){
//     echo $rand1;
// $lotto_num = arr($rand1, $rand2, $rand3, $rand4, $rand5);
// switch($rand_num){
//         $lotto = "";
//         echo $lotto;
//         break;
//     }
//     $lotto = "";

// }
// if()

// echo "행운의 번호는 [$lotto]"." 보너스번호 : [$rand6]"."축하합니다";
// var_dump($rand_num);