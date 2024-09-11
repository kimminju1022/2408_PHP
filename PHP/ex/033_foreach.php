<?php
/**foreach문 (영상자료 재시청 필요)
 * 배열을 편하게 루프하기 위한 반복문
 */
$arr = [1,2,3];
foreach($arr as $key => $val){
    echo "key : ".$key.",value : ".$val."\n";
}
echo "\n-----------\n";

// for를 활용해 배열을 반복하는 경우
$maxindex = count($arr)-1;
for($i = 0;$i<=$maxindex;$i++){
    echo "key : ".$i.", value : ".$arr[$i]."\n";
}

// arr2를 이용해 구구단을 찍어주세요
// $dan = [2,3,4,5,6,7,8,9];
// $arr2 = [1,2,3,4,5,6,7,8,9];
// foreach($dan as $arr2){
//     echo $dan." X ".$arr2." = ".($dan*$arr2)."\n";
// }

// 2단출력
$arr2 = [1,2,3,4,5,6,7,8,9];
foreach($arr2 as $cal){
    echo "2 X ".$val."=".($val*2)."\n";
}


echo"\n-----\n";
// 연관배열의 경우 : 키값을 정해주는 배열
$arr3 = [
    "name" => "Unicorn"
    ,"age"=>20
    ,"gender"=>"f"
];
foreach($arr3 as $key => $val){
    echo $key." : ".$val."\n";
}

echo "\n-----\n";
$resualt = [
    ["id" => 1,"name"=>"갑돌이", "gender"=> "m"]
    ,["id" => 2,"name"=>"갑순이", "gender"=> "m"]
    ,["id" => 3,"name"=>"미경이", "gender"=> "m"]
    ,["id" => 4,"name"=>"영철이", "gender"=> "m"]
];

foreach($resualt as $key => $imeam){
    echo $sistem["name"]."1\n";
}