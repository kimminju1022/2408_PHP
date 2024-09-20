<?php

// 하나라도 실패 시 저장하지 않고 롤백하기

require_once("../ex/my_db.php");

//3명의 신규 사원 정보를 employees에 추가해야한다
//배열을 돌리는 foreach를 사용해 사원정보를 입력해 준다
$data = [
    ["name" => "둘리", "birth" => "1986-01-01", "gender" => "M"]
    ,["name" => "희동이", "birth" => "1990-01-01", "gender" => "M"]
    ,["name" => "고길동", "birth" => "1968-01-01", "gender" => "M"]
];

$conn = null;


try {
    $conn = my_db_conn();
// 전부 롤백 하기 위해 foreach앞에 하고 commit도 밖에 해야함
    $conn->beginTransaction();

    // 복수의 데이터 루프 [item에 사원 정보를 담는다]
    foreach($data as $item) {
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
    }
    //commit
    $conn->commit();

} catch(Throwable $th){
    if(!is_null($conn)){
        $conn->rollback();
    }
    echo $th->getMessage();
}