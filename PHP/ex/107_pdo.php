<?php

// PDO class : DB 액세스 방법 중 하나 
// 장점 maria db에서 오라클 가도 pdo클래스는 여러 매체를 돌아도 쓸 수 있게 만들어 뒀다

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

// db정보
$my_host = "localhost"; //DB host
$my_port = "3306"; //DB계정명
$my_user = "root"; //port
$my_password = "php504"; //DB 계정 비밀번호
$my_db_name = "dbsample"; //접속할 DB명
$my_charset = "utf8mb4"; // DB Charset
//세계적으로 캐릭터셋을 utf8을 사용하며, 문자를 표현하는 방법이다. 호환되지 않으면 아스키코드 즉, 글자가 깨져 읽을 수 없는 문자로 출력된다

//DSN(Database Source Name)
$my_dsn = "mysql:host=".$my_host.";port=".$my_port.";dbname=".$my_db_name.";charset=".$my_charset;
//기존것은 두고 dell v001이렇게 메세지를 남기고 새 코드를 입력하여 add v002로 표시하여 버전2에 추가되었다고 표시해 둔다

// PDO option 설정[PDO질의 시 미리 셋팅해 두는 것]
$my_otp = [
// password Statement의 애뮬레이션 설정
PDO::ATTR_EMULATE_PREPARES      =>false
// 예외 발생 시, 예외 처리하는 방법 설정
,PDO::ATTR_ERRMODE              =>PDO::ERRMODE_EXCEPTION
// fetch할 때 데이터 타입 설정
,PDO::ATTR_DEFAULT_FETCH_MODE   =>PDO::FETCH_ASSOC
];
// PDO Class 인스턴스
$conn = new PDO($my_dsn, $my_user, $my_password, $my_otp);
// new는 class를 인스턴스화 하는데 사용한다. 사용할 준비를 해야하는 데 이 준비를 하는 것(설명 다시 듣기1교시 후반부)

// select
$sql = "SELECT"
        ."*"
        ."FROM"
        ."      employees "
        ." LIMIT 3 "
        ;

$stmt = $conn->query($sql); //쿼리 실행 (하고 나면 패치작업을 해야 한다)
$result = $stmt->fetchAll(); //결과 패치

print_r($result); //여기서 계속 봐뀌는 것은 $sql 쿼리 뿐이다

// select예제
$sql =
        " SELECT "
        ."  * "
        ." from "
        ."      employees "
        ." where "
        ."      emp_id = :emp_id1 "
        ."  OR  emp_id = :emp_id2 "
;
$prepare = [
    "emp_id1" => 10001
    ,"emp_id2" => 10002
];

$stmt = $conn->prepare($sql); // 쿼리 준비
$stmt->execute($prepare); //쿼리실행
$result = $stmt->fetchAll(); //결과 fetch

print_r($result);
