<?php

require_once("./my_db.php"); //파일 불러오기

$conn = null;

try {
    // PDO class 인스턴스화
    $conn = my_db_conn();

    $sql =
            " UPDATE employees "
            ." SET "
            ."      name = :name " //여기서 웨어절 빠지면 모든 사원 정보 바뀐다 꼭 조건 줘라!!
            ." WHERE "
            ."      emp_id = :emp_id "
        ;
        $arr_prepare = [    //바꾸고자 하는 조건 적기
            "name" => "갑돌이"
            ,"emp_id" => 100017

        ];

        $conn->beginTransaction(); //쿼리 준비 실행 작성 후 트랜잭션 시작 할 수 있게 작성

        $stmt = $conn->prepare($sql); //쿼리 준비
        $result_flg = $stmt->execute($arr_prepare); //쿼리 실행
        $result_cnt = $stmt->rowCount(); //영향받은 레코드 수 반환

        if(!$result_flg) {
            throw new Exception("쿼리 실행 예외 발생");
        }

        if($result_cnt !==1) {
            throw new Exception("수정 레코드수 이상");
        }

        $conn->commit(); //커밋처리
}catch(Throwable $th){
    if(!is_null($conn)){
        $conn->rollBack();
    }
    echo $th->getMessage();

}