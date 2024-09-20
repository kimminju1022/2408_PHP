<?php
//동적쿼리 data에 계속 입력하면 and로 처리가 다 됨
$data = [   //부여하고자 하는 정보 기입
    "name" => "둘리"
    ,"gender" => "M"
    ,"birth" => "1990-01-01"
];

$sql =
    " SELECT * "
    ." FROM employees "
;

$where = "";
$arr_prepare = [];

foreach($data as $key => $val) {
    //where절 작성
    if(empty($where)){
        $where .= " WHERE ";
    }else{
        $where.= " AND ";
    }
    $where .= " ".$key." = ".$key;

    // prepared statement 작성
    $arr_prepare[$key] = $val;
}

$sql .= $where;

// echo $sql;
// print_r($arr_prepare);

require_once("./my_db.php");
$conn = my_db_conn();

$stmt = $conn->prepare($sql);
$stmt->execute($arr_prepare);

print_r($stmt->fetchAll());