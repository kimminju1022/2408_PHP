<?php

require_once("./my_DB.php");
//  my_db.php 로 작성했기 때문에 손쉽게 데이터 베이스 접속할 수 있게 된 것
// $conn = my_db_conn();

// try, catch
//107_try.php참조

/**유저가 검색어를 입력하기 때문에 검색된 값에 대한 반영을 해주기 위해서 where를 활용해야한다 */
try{
$conn = my_db_conn();
$id = 1;

//Prepared Statement(트렁케이트 쓰는 이유 노션에서 확인)
$sql = " SELECT "
        ."      * "                        // $sql = "SELECT *
        ." from employees "                // from employees
        ." WHERE"
        ."      emp_id = :emp_id "         // WHERE emp_id =1 ";
        ."     AND name = :name "
;
$arr_prepare = [
    "emp_id" => $id
    ,"name" => "홍길동"
];

$stmt = $conn->prepare($sql);   //DB질의 준비
$stmt->execute($arr_prepare);   //질의 실행
$result = $stmt->fetchAll();    //질의 결과 패치
}catch(Throwable $th){
    echo $th->getMessage();     //예외 메세지 출력
}