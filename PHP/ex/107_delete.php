<?php

require_once("./my_db.php");

$conn = null;

try {
    // pdo 인스턴스 획득
    $conn = my_db_conn();

    //transaction 시작
    $conn->beginTransaction(); //현재상태로는 conn에 pdo가 들어가 있음

    //sql - 회원번호 100001삭제
    $sql =
        " DELETE FROM employees "
        ." WHERE "
        ."        emp_id = :emp_id1 "
        ."    OR  emp_id = :emp_id2 "
        ."    OR  emp_id = :emp_id3 "
        ."    OR  emp_id = :emp_id4 "
        ."    OR  emp_id = :emp_id5 "


    ;
    $arr_prepare = [
        "emp_id1" => 100006
        ,"emp_id2" => 100007
        ,"emp_id3" => 100008        ,"emp_id4" => 100004
        ,"emp_id5" => 100009
    ];

    $stmt = $conn->prepare($sql); //쿼리준비
    $result_flg = $stmt->execute($arr_prepare); //쿼리실행
    $result_cnt = $stmt->rowCount(); //영향 받은 레코드의 수 획득

    if(!$result_flg){
        throw new Exception("쿼리 실행 중 예외 발생");
    }
    if($result_cnt > 1){
        throw new Exception("삭제 레코드 수 이상 발생");
    }

    $conn->commit();
} catch(Throwable $th) {
    if(!is_null($conn)){
        $conn->rollBack();
    }
    echo $th->getMessage();
}
