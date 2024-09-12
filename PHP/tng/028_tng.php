<?php
/**Q1. 3의 배수 게임
 * 출력예시 > 1,2,짝,4,5,짝,7,8,짝,10,11,짝...........
 * 출력조건 : 100까지 출력
 */

//  A1. **고집부리지 말고 잘 생각해라!!!!!!
for($i = 1; $i<100; $i++){
    if(($i % 3) === 0){
        echo "짝 ";
        continue;
    }
    echo $i." "; 
}

echo "\n-----\n";

/**Q2. 반복문을 이용하여 급여가 5000이상이고 성별이 남자인 사원의 id와 이름을 출력하라
 * 출력예)
 * id : 1, name : 미어캣
 * id : 2, name : 홍길동
 * .....
 */

$arr = [
    ["id" => 1, "name" => "미어캣", "gender" => "m", "salary" =>"6000"]
    ,["id" => 2, "name" => "홍길동", "gender" => "m", "salary" =>"3000"]
    ,["id" => 3, "name" => "갑순이", "gender" => "f", "salary" =>"10000"]
    ,["id" => 4, "name" => "갑돌이", "gender" => "m", "salary" =>"8000"]
];

foreach($arr as $info){
    if($info['salary']>=5000 && $info['gender']==='m')
    echo 'ID : '.$info['salary'].'  '.'이름 : '.$info['name']."\n";
}

// T해설 int로 형변환 문자열로 맞춰줌
foreach($arr as $key => $item){
    if(((int)$item["salary"]>=5000) && ($item["gender"]==='m')){
        echo "id : ".$item["id"].", name : ".$item["name"]."\n";
    }
}


// 무한반복됨
// foreach($arr as $key){
//     for($key['salary']>5000; $key['gender']="m";){
//     echo "id : ".$key['id']."  "."이름 : ".$key['name']."\n";
//     }
// }
// for($key['salary'] >= 5000; $key['gender'] = "m";)
// foreach($arr as $key){
//     echo "id : ".$key['id']."  "."이름 : ".$key['name']."\n";
// }
// for($arr=0; $arr<=4; $arr++){
//     if($key['salary'] >= 5000){
//         break;
//     }
//     if ($key['gender'] = "m"){
//         break;
//     }
//     echo "id : ".$key['id']."  "."이름 : ".$key['name']."\n";   
// }
