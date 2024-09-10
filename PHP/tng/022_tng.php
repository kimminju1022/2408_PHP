<?php
 /**  IF로 만들어주세요.
  * 성적
  * 범위 :
  *   100   : A+
  *   90이상 100미만 : A
  *   80이상 90미만 : B
  *   70이상 80미만 : C
  *   60이상 70미만 : D
  *   60미만: F

 *출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"
  */

$answer1 = -1;
if($answer1 === 100){
    echo "당신의 점수는 ".$answer1."점 입니다.". "<A+>";
}else if($answer1 >= 90){
    echo "당신의 점수는 ".$answer1."점 입니다.". "<A>";
}else if($answer1 >= 80){
    echo "당신의 점수는 ".$answer1."점 입니다.". "<B>";
}else if($answer1 >= 70){
    echo "당신의 점수는 ".$answer1."점 입니다.". "<C>";
}else if($answer1 >= 60){
    echo "당신의 점수는 ".$answer1."점 입니다.". "<D>";
}else{
    echo "당신의 점수는 ".$answer1."점 입니다.". "<F>";
};


echo "\n---------------------\n";
$score = 80;
$rank = "";
if($score >=0 && $score <=100){
if($score === 100){
	$rank = "A+";
}else if($score >=90){
	$rank = "A";
}else if($score >=80){
	$rank = "B";
}else if($score >=70){
	$rank = "C";
}else if($score >=60){
	$rank = "D";
}else{
	$rank = "F";
}
echo "당신의 점수는 ".$score."점 입니다."."<$rank>";
}