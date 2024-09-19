<?php
// 나의 급여를 2500만원으로 변경
// 100017 / 2500000

require_once("../ex/my_db.php"); //파일 불러오기

$conn = null;

try {
    // PDO class 인스턴스화
    $conn = my_db_conn(); 
    
    //transaction 시작
    $conn->beginTransaction();
    
    //이름 update
    $sql =
            " UPDATE employees "
            ." SET "
            ."      name = :name "
            ." WHERE "
            ."      emp_id = :emp_id "
        ;
        $arr_prepare = [    
            "name" => "김민주"
            ,"emp_id" => 100017

        ];

        $stmt = $conn->prepare($sql); //쿼리 준비
        $result_flg = $stmt->execute($arr_prepare); //쿼리 실행
        $result_cnt = $stmt->rowCount(); //영향받은 레코드 수 반환

        if(!$result_flg) {
            throw new Exception("쿼리 실행 예외 발생");
        }

        if($result_cnt !==1) {
            throw new Exception("수정 레코드수 이상");
        }

        
        // 금액 update
     $sql =
        " UPDATE salaries "
        ." SET "
        ."      end_at = NOW()"
        ."      ,updated_at = NOW()"
        ." WHERE "
        ."      emp_id = :emp_id "
        ;
        $arr_prepare = [
            "emp_id" => 100017
        ];
        
        $stmt = $conn->prepare($sql);
        $result_flg = $stmt->execute($arr_prepare);
        $result_cnt = $stmt->rowCount();
        
        if(!$result_flg) {
            throw new Exception("Insert Query Error : salaries");
        }
        if($result_cnt !==1){
            throw new Exception("Insert Count Error : salaries");
        }
        
    $sql =
        " INSERT INTO salaries( "
        ."      emp_id "
        ."      ,salary "
        ."      ,start_at "
        ." ) "
        ." VALUES( "
        ."  :emp_id "
        ." , :salary "
        ." ,DATE(NOW()) "
        ." ) "
        ;
        $arr_prepare = [
            "emp_id" => 100017
            ,"salary" => 25000000
        ];
        
        $stmt = $conn->prepare($sql);
        $result_flg = $stmt->execute($arr_prepare);
        $result_cnt = $stmt->rowCount();
        
        if(!$result_flg) {
            throw new Exception("Insert Query Error : salaries");
        }
        if($result_cnt !==1){
            throw new Exception("Insert Count Error : salaries");
        }

        $conn->commit();

    }catch(Throwable $th){
        if(!is_null($conn)){
            $conn->rollBack();
        }
        echo $th->getMessage();
    }
    