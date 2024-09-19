<?php

//require_once로 외부 파일 불러 오기
require_once("./my_db.php");

$conn = null;  //초기화 작업 필요
try{
    $conn = my_db_conn();

    // sql
    $sql =
        "  INSERT INTO  employees( "
        ."      name "
        ."       , birth "
        ."       , gender "
        ."       , hire_at "
        ." ) "
        ." VALUES( "
        ."      :name "
        ."       ,:birth "
        ."       ,:gender "
        ."       ,DATE(NOW())"
        ." ) "
        ;
    $arr_prepare = [
        "name"     => "홍길동"
        ,"birth"    => "2001-11-11"
        ,"gender"   => "m"
    ];

    // transaction 시작
    $conn->beginTransaction();


    $stmt = $conn->prepare($sql); //쿼리 준비
    $exec_flg = $stmt->execute($arr_prepare);  //쿼리 실행
    $result_cnt = $stmt->rowCount(); // 영향 받은 레코드 수를 반환


    if(!$exec_flg) {
        throw new Exception("excute 예외 발생","E01"); //강제로 예외 발생 시켜 멈추고 catch로 간다
    }

    // $result_cnt=0; //예외 상황 일부러 발생 시킴
    //영향 받은 레코드 수 이상
    if($result_cnt !== 1) {
        throw new Exception("레코드수 이상","2"); //강제로 예외 이상
    }

    // commit 처리
    $conn->commit();
}catch(Throwable $th) {
    // PDO인스턴스화 실행 확인
    if(!is_null($conn)){
    $conn->rollBack();
}
    echo $th->getCode()." ".$th->getMessage();
}