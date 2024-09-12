<?php
/**  신나게 함수 만들기 ¯\_(ツ)_/¯ */

/** 두 수를 전달해 주면 합을 반환하는 함수 생성*/
function my_sum($num1, $num2){
    return $num1+$num2;

}

my_sum(3,5); //함수 호출
time();

//Q1. 두 수를 받아서 -,*,+,%의 결과를 리턴하는 함수를 만들어 보라

function my_minus($num1, $num2){
    return $num1-$num2;
}
function my_multi($num1, $num2){
    return $num1*$num2;
}
function my_add($num1, $num2){
    return $num1+$num2;
}
function my_division($num1, $num2){
    return $num1%$num2;
}

echo my_minus(3,7)."\n";
echo my_multi(1,9)."\n";
echo my_add(4,6)."\n";
echo my_division(3,8)."\n";

echo "\n--------------------\n";

/** 가변 길이 아규먼트
 * 전달되는 모든 숫자를 더해서 반환
*/

function my_sum_all(...$numbers){
//     $sum = 0;
//     foreach($numbers as $val){
//         $sum += $val;
//     }
//     return $sum;
// }
    return array_sum($numbers);
}
echo my_sum_all(1,5,8,9,3,1,5)."\n";

// 5.5버전 이하일 때 가변길이 아규먼트 사용법
function my_sum_1(){
    $numbers = func_get_args();
    return array_sum($numbers);
    
}
    echo my_sum_1(1,5,8,9,3,1,5);
echo "\n--------------------\n";

function test($param_str, ...$arr_str){
        $str = "";
        foreach($arr_str as $val){
            $str .= $val;
        }
        $str .= $param_str;
        echo $str;
    }
    test("젤뒤","a","b","c");