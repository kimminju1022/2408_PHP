<?php
/**  php 내장함수
* trim(문자열) : 문자열의 공백을 제거해서 반환
*/
$str= "   미어캣 ";
echo trim($str);

echo"\n--------------\n";

// strtoupper(문자열), strtolower(문자열) : 문자열을 대/소문자로 변환해서 반환
$str2 = "AbcDef";
echo strtoupper($str2);
echo strtolower($str2);

echo"\n--------------\n";

/** 
 * strlen(문자열) : 문자열의 길이를 반환 멀티바이트 문자열에 대응 못함
 * mb_strlen(문자열) : 문자열의 길이를 반환, 멀티바이트 문자열에 대응
 * mb(multibyte) -> 한글은 기본 3바이트인데 아래 예시처럼 멀티를 주면 글자 자릿수만 인식하여 반환 */
$str3 = "미어캣";
echo strlen($str3)."\n";
echo mb_strlen($str3);

echo"\n--------------\n";

/**
 * str_replace(문자열) : 특정 문자를 치환해서 반환
 */
$str4 = "key : 34kdsoo0324dskgjl";
echo str_replace("k","a",$str4);

echo"\n--------------\n";

/**
 * mb_substr(대상문자열, 자를 개수, 출력할 개수) : 문자열을 잘라서 반환
 * ex) echo mb_substr($str5, 1, 3)."\n"; //좌측 1이전 자리가 잘린다 0의 위치에 있는 문자를 
 *                                         탈락 시키고 왼쪽 3자리를 출력한다
 *     echo mb_substr($str5, -2, 1);  //우측부터 잘리는데 뒷자리 시작은 0자리가 없어 2의 위치에
 *                                      있는 문자 부터 출력 되며 1자리 글자를 출력한다
 */
$str5 = "PHP입니다.";
echo mb_substr($str5, 1, 3)."\n"; //좌측부터 잘린다
echo mb_substr($str5, -2, 1);  //우측부터 잘린다

echo"\n--------------\n";

/**
 * mb_strpos(대상문자열, 검색할 문자열) : 검색할 문자열의 특정 위치를 반환
 */
$str6 = "점심 뭐먹지?";
echo mb_strpos($str6,"뭐")."\n";
// 뭐부터 3글자 잘라오기
echo mb_substr($str6,mb_strpos($str6,"뭐"),3);

echo"\n--------------\n";

/**
 * sprintf(포맷문자열, 대입문자열1, 대입문자열2.....):포맷 문자열에 대입 문자열을 순서대로 대입하여 반환
 * 양수 숫자는 %u, %d는 양수부터 음수까지, %s는 문자열을 출력한다 d는 정수 f는 소수점 까지 반환
 */
$str_format = "당신의 점수는 %f점입니다. <%s>";
echo sprintf($str_format, 90, "A")."\n";
$str_format = "당신의 점수는 %.5f점입니다. <%s>";
echo sprintf($str_format, 261.2548475213544, "A");

echo"\n--------------\n";

/**
 * isset(변수) :  변수가 설정되어 있는지 확인하여 [ true/false ]를 반환
*/
$str7 = "";
$str8 = null;
var_dump(isset ($str7));
var_dump(isset ($str8));
var_dump(isset ($no));

echo"\n--------------\n";

/**
 * empty(변수) : 변수의 값이 비어있는지 확인하여 [ true/false ]를 반환
 */
$empty1 = "abc";
$empty2 = "";
$empty3 = 0;
$empty4 = [];
$empty5 = null;
$empty6 = "ㄱㄴㄷ";
var_dump(empty($empty1));
var_dump(empty($empty2));
var_dump(empty($empty3));
var_dump(empty($empty4));
var_dump(empty($empty5));
var_dump(empty($empty6));

echo"\n--------------\n";

/**
 * is_null(변수) : 변수 null인지 아닌지 확인하여 [ true/false ]를 반환
 */
$chk_null = null;
var_dump(is_null($chk_null));

echo"\n--------------\n";

/**
 * gettype (변수) : 변수의 데이터 타입을 문자열로 반환
 */
$type1 = "abc";
$type2 = 0;
$type3 = 1.2;
$type4 = [];
$type5 = true;
$type6 = null;
$type7 = new DateTime();

var_dump(gettype($type1));

echo gettype($type1)."\n";
echo gettype($type2)."\n";
echo gettype($type3)."\n";
echo gettype($type4)."\n";
echo gettype($type5)."\n";
echo gettype($type6)."\n";
echo gettype($type7)."\n";
// 타입체크방법 예시)
// if(gettype($type1)=== "integer"){

// }

echo"\n--------------\n";

/**
 *seetype(변수, 데이터타입) : 변수의 데이터 타입을 변환
 */
$type = "1";
// var_dump((int)$type8); ← 원본은 변경하지 않고 캐스팅
settype($type8,"int"); // ← 원본의 데이터 타입을 변환
var_dump($type8);
echo"\n--------------\n";

/** 시간과 관련된 함수
 * time() : 현재 시간을 반환하는데 (timstamp : 초단위 ex> 1990.01.01로 부터 몇 초 지났는지 책정됨)
 */
echo time();

echo"\n--------------\n";

// date(시간포맷,타임스탬프값) : 시간 포맷형식으로 문자열을 반환 (Y 4자리. y뒤 두자리)
echo date("Y-m-d H:i:s",time()); //현재시간 구할 때 많이 사용 time을 사용함으로써 정확성을 높임

echo"\n--------------\n";
/**
 * ceil(변수), round(변수), floor(변수) : 각 올림, 반올림, 버림 반환 
 */
echo ceil(1.2)."\n";
echo round(1.5)."\n";
echo floor(1.9)."\n";

echo"\n--------------\n";

/**
* random_int(시작값, 끝값) :시작값부터 끝값까지 랜덤한 숫자를 반환
* int를 쓰는 것도 있지만 random자체가 실수를 인식하지 못한다
*/
echo random_int(1,10);