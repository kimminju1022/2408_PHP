<?php

// 성공한것은 저장되고 실패한 것만 에러 사유 표기

require_once("../ex/my_db.php");

//3명의 신규 사원 정보를 employees에 추가해야한다
//배열을 돌리는 foreach를 사용해 사원정보를 입력해 준다
$data = [
    ["name" => "둘리", "birth" => "1986-01-01", "gender" => "M"]
    ,["name" => "희동이", "birth" => "이리오너라", "gender" => "M"]
    ,["name" => "고길동", "birth" => "1968-01-01", "gender" => "M"]
];

$conn = null;

try {
    $conn = my_db_conn();

    // 루프를 먼저 돌림
    foreach($data as $item) {
        try {
            // transactio시작
            $conn->beginTransaction();

            // 새 사원 정보 삽입
            $sql = 
            " INSERT INTO employees( "
            ."      name "
            ."      ,birth "
            ."      ,gender "
            ."      ,hire_at "
            ." ) "
            ." VALUES( "
            ."      :name "
            ."      ,:birth "
            ."      ,:gender "
            ."      ,DATE(NOW()) "
            ." ) "
            ;
            $arr_prepare = [
                "name" => $item["name"]
                ,"birth" => $item["birth"]
                ,"gender" => $item["gender"]
            ];
            $stmt = $conn->prepare($sql);
            $result_flg = $stmt->execute($arr_prepare);
        
            if(!$result_flg){
                throw new Exception("Update exec Error : employees");
            }
        
            if($stmt->rowCount() !==1){
                throw new Exception("Insert Row Count Error : employees");
            }  

            // commit
            $conn->commit();
        } catch(throwable $th) {
            if(!is_null($conn)) {
                $conn->rollBack();
            }
            echo"안쪽 try문 : ".$th->getMessage();
        }
    }

} catch(Throwable $th){
    echo "바깥쪽 try문 : ".$th->getMessage();
}

// 포이치, 트라이, 트랜잭션을 하나로 묶어 쓰기 때문에 가능한것