<?php
/**while문
 * 조건만 알려주고 조건이 만족 안될 시 무한 루프됨. 즉, 조건을 체크하고 그 결과에 따라 처리를 진행하는 반복문
 * 증감키를 반드시 써줘야 한다 while은 자동생성 안됨
 */
$cnt = 0;
while($cnt <= 3){
    echo $cnt."번째루프\n";
    $cnt++;
}
// while문도 구구단 적어보기

echo "\n---------\n";

while(true){
    echo "tt";
    break;
}