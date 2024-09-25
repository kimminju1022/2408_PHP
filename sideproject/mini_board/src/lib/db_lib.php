<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");

function my_db_conn(){
    $option = [
        pdo::ATTR_EMULATE_PREPARES      =>false
        ,pdo::ATTR_ERRMODE              =>pdo::ERRMODE_EXCEPTION
        ,pdo::ATTR_DEFAULT_FETCH_MODE   =>pdo::FETCH_ASSOC
    ];

    return new pdo(MY_MARIADB_DSN, MY_MARIADB_USER, MY_MARIADB_PASSWORD, $option);
}

function my_board_select_pagination(PDO $conn, array $arr_param) {
    $sql = 
        " SELECT "
        ."      * "
        ." FROM "
        ."      board "
        ." ORDER BY "
        ."      created_at DESC " //작성일자가 내림차순인것
        ."      ,id DESC "
        ." LIMIT :list_cnt OFFSET :offset "
    ;   
  
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }

    return $stmt->fetchAll();
}

// board테이블 유효 게시글 총 수 획득
function my_board_total_conut(PDO $conn){
    $sql =
        " SELECT "
        ."      COUNT(*) cnt "
        ." FROM "
        ."      board "
        ." WHERE "
        ."      deleted_at IS NULL "
    ;

    $stmt = $conn->query($sql);
    $result = $stmt->fetch();

    return $result["cnt"];

}
// board 테이블 insert처리
function my_board_insert(PDO $conn,array $arr_param){
    $sql = 
        " INSERT INTO board ( "
        ."       title "
        ."       ,content "
        ." ) "
        ." values ( "
        ."       :title "
        ."       ,:content "
        ." ) "
    ;

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }

    $result_cnt = $stmt->rowCount();

    if($result_cnt !==1) {
        throw new Exception("Insert Count 이상 : ".$result_cnt);
    }
    
    return true;
}
// id로 게시글 조회
function my_board_select_id(PDO $conn, array $arr_param){
    $sql =
    " SELECT "
    ."      * "
    ." FROM "
    ."      board "
    ." WHERE "
    ."      id = :id"
    ;
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);
    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }
    
    return $stmt->fetch();
}
