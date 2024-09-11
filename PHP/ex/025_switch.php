<?php
// ex>
$food = "짬뽕";

if($food === "떡볶이"){
    echo "한식";
}else if($food === "짜장면"){
    echo "중식";
}else if($food === "햄버거"){
        echo "양식";
}

echo "\n---------------\n";

/**  switch문 
 * switch는 break가 필요하다. 
 * break가 없을 경우 검토가 끝나지 않고 break가 있는 다음 조건 까지 이어지기 때문에 해당값만 찾아내고 싶다면 break를 써야함
 * -case 사용 시 1:1로 일치검증할 때 쓰자*/
switch($food){
    case"떡볶이":
        echo "한식";
        break;
    case "짬뽕": //중복된 값을 갖는 항목이 있다면 [case :]로 추가하여 작성하면 된다
    case"짜장면":
        echo "중식";
        break;
    case"햄버거":
        echo "양식";
        break;
    default :
        echo "그거 맛있음";
        break;
}

echo "\n---------------\n";

/** Q1. switch를 이용하여 작성
 * 1등이면 금상, 2등이면 은상, 3등이면 동상 4등이면 장려상 그외는 노력상을 출력하라
 * 숫자만 쓰려 했으나 문화상 n등을 쓸거라 예상했기에 '등'까지 포함 시켜 짬
 */

$rank = "1등";

switch($rank){
    case "1등" :
        echo "금상";
        break;
    case "2등" :
        echo "은상";
        break;
    case "2등" :
        echo "은상";
        break;
    case "3등" :
        echo "동상";
        break;
    case "4등" :
        echo "장려상";
        break;
    default :
        echo "노력상";
        break;
}