<?php

/**PDO class : DB 액세스 방법 중 하나
               *장점
               마리아 디비에서 오라클 가도 pdo클래스는 여러 매체를 돌아도 쓸 수 있게 만들어 뒀다
 */
//⚜ DB 접속 정보
$my_host = "localhost"; //DBhost (ip 주소가 들어감)
$my_user = "root"; //DB 계정명
$my_password = "php504"; //DB계정 비밀번호
$my_db_name = "dbsample"; //접속할 DB명
$my_charset = "utf8mb4"; //DB charset
$my_dsn = "mysql:host=".$my_host.";dbname=".$my_db_name.";charset=".$my_charset; //DSN
// -----여기 까지가 기본 설정

//⚜ PDO 옵션 설정
$my_otp = [
    // prepared statement로 쿼리를 준비할 때 PHP와 DB 어디에서 에뮬레이션을 통해 만들어 내야할 지 여부를 결정
    PDO::ATTR_EMULATE_PREPARES      => false                    //DB에서 에뮬레이션 하도록 설정
    ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION   //PDO에서 예외를 처리하는 방식을 지정 exception,error처리
    ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC         //DB결과를 fetch하는 방식을 지정 [연관배열로 fetch]
];

//⚜ DB 접속
$conn = new PDO($my_dsn, $my_user, $my_password, $my_otp);

//sellect
$sql = "SELECT *
        from employees
        order BY emp_id ASC
        LIMIT 5"
;

// ↓ 요거대로 정보를 데려와줘 하는 말
$stmt = $conn->query($sql); // PDO::qurey():쿼리준비+실행 [conn에서 받은걸 stmt로 담는데 stmt에는 클래스가 담겨있다 sql이 아규먼트다]
$result = $stmt->fetchAll(); // 질의 결과를 패치
print_r($result);

//사번과 사원의 이름만 출력하자(선택 정보 출력)
foreach($result as $item){
    echo $item["emp_id"]." ".$item["name"]."\n";
}