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