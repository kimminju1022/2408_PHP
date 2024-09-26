<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php"); //config파일의 정보를 가져와 쓴다
require_once(MY_PATH_DB_LIB); //db_lib 파일의 정보를 가져와 쓴다

$conn = null;

try{
    //id 획득방법
    $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

    //page획득
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

    if($id < 1) {
        throw new Exception("!파라미터 오류!");
    }

    //PDO instance
    $conn = my_db_conn();

    $arr_prepare = [
        "id" => $id
    ];

    $result = my_board_select_id($conn, $arr_prepare);


} catch(Throwable $th){
    require_once(MY_PATH_ERROR);
    exit;
}

?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/detail.css">

    <title>상세 페이지</title>

</head>

<body>
    <?php
    require_once(MY_PATH_ROOT . "header.php");
    ?>

    <main>
        <div class="main-content">

            <div class="box">
                <div class="box-title">게시글 번호</div>
                <div class="box-content"><?php echo $result["id"] ?></div>
            </div>
            <div class="box">
                <div class="box-title">제목</div>
                <div class="box-content"><?php echo $result["title"] ?></div>
            </div>
            <div class="box">
                <div class="box-title">내용</div>
                <div class="box-content"><?php echo $result["content"] ?></div>
            </div>
            <div class="box">
                <div class="box-title">작성일자</div>
                <div class="box-content"><?php echo $result["created_at"] ?></div>
            </div>
            <div class="main-footer">
                <a href="/update.php?id=<?php echo $result["id"]?>&page=<?php echo $page ?>"><button type="button" class="btn-small">수정</button></a>
                <a href="/index.php?page=<?php echo $page ?>"><button type="button" class="btn-small">완료</button></a>
                <a href="/delete.php?id=<?php echo $result["id"]?>&page=<?php echo $page ?>"><button type="button" class="btn-small">삭제</button></a>
            </div>
        </div>
    </main>
</body>

</html>