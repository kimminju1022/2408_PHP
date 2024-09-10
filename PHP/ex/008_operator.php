<?php
// 대입 연산자 [ = ] 값을 변수에 대입하는 연산자
$num = 1;

// 산술연산자 [ + - / * % ] 사칙연산, 나머지 구하는 기능을 하는 연산자
$num1 = 10;
$num2 = 5;
// 더하기 +
echo $num1 + $num2;
echo "\n";
// 빼기
echo $num1 - $num2;
echo "\n";
// 곱하기
echo $num1 * $num2;
echo "\n";
// 나누기
echo $num1 / $num2;
echo "\n";
// 나머지 (주로 홀짝을 구할 때 사용하며 나머지를 int로 형변환하면 정수로 가능하다 그 외에도 함수를 활용할 수 있다)
echo $num1 % $num2;
echo "\n";

$mul = 4*4+1-(5+2);

// 산술 대입 연산자
$tmp1 = 0;
$tmp1 = $tmp1 + 5;

// 더하기
$tmp1 += 5; //↑위와 같은 맥락으로 산술연산자를 활용한 것이다

// 빼기
$tmp1 -= 5;

// 곱하기
$tmp1 *= 5;

// 나누기
$tmp1 /= 5;

// 나머지
$tmp1 %= 5;

// 연결연산자
$str1 = "안녕";
$str1 .= "하세요";
echo $str1;


/** 산술 대입 연산자를 이용해서 풀어봅시다
 * $tng_num = 100;
 * $tng_num에 10을 더해주세요
 * $tng_num에 5로 나누어주세요
 * $tng_num에 4를 빼주세요
 * $tng_num를 7로 나눈 나머지를 구해주세요
 * $tng_num에 3을 곱해주세요
 */

$tng_num = 100;
echo "\n";
echo $tng_num += 10;
echo "\n";
echo $tng_num /= 5;
echo "\n";
echo $tng_num -= 4;
echo "\n";
echo $tng_num %= 7;
echo "\n";
echo $tng_num *= 3;

/**  증감연산자 : n을 더하거나 빼는 연산자
 * 후위 증감연산자 :
 * 전위 증감연산자 : 몇번했는지 count할 때 많이 사용된다
 * ;은 하나의 처리가 끝났다는 의미이다 후위는 
 * */
echo "----------------------\n";
//  후위
$sum =0;
$num++;
echo $num."\n";
$num++;
echo $num."\n";
echo $num++."\n";
echo $num."\n";

echo "----------------------\n";
// 전위
$sum =0;
++$num;
echo $num."\n";
++$num;
echo $num."\n";
echo $num++."\n";
echo $num."\n";

echo "----------------------\n";

/** 비교연산자 : 두 값을 비교하는 연산자
 * true
 * false
 */

 var_dump(1>0);
 var_dump(1<0);
 var_dump(1>=0);
 var_dump(1<=0);

 $num = 1;
 $str = "1";
 var_dump($num == $str);
var_dump($num === $str); //완전비교

$num = 1;
$str = "1";
var_dump($num != $str);
var_dump($num !== $str);
echo "----------------------\n";

/**  생김새가 같기 때문에 true가 나온다 [ == ]이건 불완전 비교다 [ === ]값과 데이터 타입을 모두 검사한다 
 * 변수1 == 변수2 :  변수 1과 변수 2가 같다 불완전 비교(데이터 타입 체크x)
 * 변수1 === 변수2 :  변수 1과 변수 2가 같다 완전 비교(데이터 타입 체크o)
 * 변수1 != 변수2 :  변수 1과 변수 2가 같지 않다 불완전 비교(데이터 타입 체크x)
 * 변수1 !== 변수2 :  변수 1과 변수 2가 같지 않다 완전 비교(데이터 타입 체크o)
 */

//  논리연산자 : 값이 boolean 타입만 가지는 집합에서 사용하는 연산(and 연산자, or연산자, !연산자)
// and 연산자
var_dump(1 === 1 && 2===1);

// or연산자
var_dump(1 === 1 || 2===1);

// not연산자
var_dump(!(1 === 1));

// 삼항연산자
$result = 1 === 1? "참입니다" : "거짓입니다";
var_dump($result);