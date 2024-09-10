<?php

// ☘ 변수 (variable)
echo "2 X 1 = 2\n";
echo "2 X 2 = 4\n";
echo "2 X 3 = 6\n";
echo "2 X 4 = 8\n";
echo "2 X 5 = 10\n";
echo "2 X 6 = 12\n";
echo "2 X 7 = 14\n";

$dan = 6;
echo $dan ."X 1 = 2\n";
echo "$dan X 2 = 4\n";
echo "$dan X 3 = 6\n";
echo "$dan X 4 = 8\n";
echo "$dan X 5 = 10\n";
echo "$dan X 6 = 12\n";
echo "$dan X 7 = 14\n";

// 변수 선언
// ↓ num을 변수 선언한 것
$num;

// 변수 초기화
$num = 1;

//  변수 선언 및 초기화
$str = "가나다";

// ---------------------
/** 네이밍기법 
 * 스네이크 기법 : 단어_단어 → user_name
 * 카멜기법 : 단어단어인데 첫글자를 대문자로 → userName
 */

//  상수(constants) : 절대 변하지 않는 값
define("AGE", 20);
echo AGE;
// AGE는 이미 선언된 상수이므로 Warding이 일어나고 값이 바뀌지 않는다 해서 선언명을 다른걸로 바꿔줘야 함
define("PAGE", 2_000); 
echo PAGE;


$name = "미어캣\n";
echo $name;
$name = "유니콘";
echo $name;

// 변수의 값을 LITERER

// underscore 표기법
$num = 10_000_000;
echo $num;

/** Q.아래처럼 변수값을 담아서 출력해 주세요
 * 점심메뉴
 * 탕수육 8,000
 * 짜장면 6,000
 * 짬뽕 6,000
 */

 
//  민주 답
 $name = "\n점심메뉴";
 echo $name;
 $name = "\n탕수육 ";
 echo $name;
 $num = "8,000";
echo $num;
$name = "\n짜장면 ";
echo $name;
$num = "6,000";
echo $num;
$name = "\n짬뽕 ";
echo $name;
$num = "6,000";
echo $num;

// T답
$menu = "\n점심메뉴\n";
$tang = "탕수육 8,000\n";
$zza ="짜장면 8,000\n";
$zzam = "짬뽕 6,000\n";

echo $menu, $tang, $zza, $zzam;

// -------------------
// 두 변수의 스왑
$num1 = 200;
$num2 = 10;
$temp;
// 이러면 둘 다 200이 되어 버림

$temp = $num1;
$num1 = $num2;
$num2 = $temp;
echo $num1, $num2;
echo "\n--------------------------\n";
$num1 = $temp;
$num2 = $num1;
$temp = $num2;
echo $num1, $num2;
echo "\n--------------------------\n";
// ---------------------
// 데이터 타입(교재에는 없음)
// ---------------------

// num의 타입은 int이며 이를 확인하기 위해  var_dump사용
$num = 1;
var_dump($num);

// double의 타입은 float
$double = 3.124548651;
var_dump($double);

// string의 타입은 문자열이다 [ string(n) ▷ n: en(1byte) ko(3byte) ]
$str = "abc 가나다";
var_dump($str);

// boolean:논리값
$boo = true;
var_dump($boo);


// null :널 /메모리상에는 있지만 값이 없는 상태이다
$null = null;
var_dump($null);

// array : 배열
$arr = [1, 2, 3];
var_dump($arr);

// $object : 객체
$obj = new DateTime();
var_dump($obj);

// 형변환
$casting= (string)$num;
var_dump($casting); 