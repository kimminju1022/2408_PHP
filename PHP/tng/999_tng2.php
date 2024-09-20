<?php

// 가위 바위 보 중 하나를 입력하면 컴퓨터는 랜덤으로 하나를 택하여 출력하도록 하라

/**코드 계획
 * 가위바위보 룰을 생성
 * 컴퓨터 랜덤 택1 방법 생성
 * -com이 받은 randN에 따라 출력 값과 비교할 값을 부여
 * 나의 입력값 받을 곳 마련
 * 결과 값을 출력하도록 함
*/

// 유저 값 입력
fscanf(STDIN,"%s", $input);
// fgets(STDIN,"%s", $input);

// 랜덤 값 추출
$comC = ["rock","scissors","paper"];
$comN = array_rand($comC);

// 결과 비교 규칙
// -만일 유저가 입력한 값이 다음과 같이 비교 된다면 입력한 값을 반환하라
if ($comC[$comN]==="scissors" && $input==="scissors"){
    $result = "비겼습니다";
}else if($comC[$comN]==="scissors" && $input ==="rock"){
    $result = "이겼습니다";
}else if($comC[$comN]==="scissors" && $input==="paper"){
    $result = "졌습니다";  
}else if($comC[$comN]==="rock" && $input ==="rock"){
    $result = "비겼습니다";
}else if($comC[$comN]==="rock" && $input==="paper"){
    $result = "이겼습니다";  
}else if($comC[$comN]==="rock" && $input ==="scissors"){
    $result = "졌습니다";
}else if($comC[$comN]==="paper" && $input==="paper"){
    $result = "비겼습니다";  
}else if($comC[$comN]==="paper" && $input==="scissors"){
    $result = "이겼습니다";  
}else if($comC[$comN]==="paper" && $input ==="rock"){
    $result = "졌습니다";
}

// 결과 출력
echo " user : ".$input."    com : ".$comC[$comN]."\n $result";