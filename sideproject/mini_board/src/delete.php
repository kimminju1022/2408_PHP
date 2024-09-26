<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php"); //config파일의 정보를 가져와 쓴다
require_once(MY_PATH_DB_LIB); //db_lib 파일의 정보를 가져와 쓴다

$conn = null;

// try catch
try {
    if (strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
        // get처리

        // id획득
        $id = isset($_GET["id"]) ?  (int)$_GET["id"] : 0;

        // page 획득
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

        if ($id < 1) {
            throw new Exception("파라미터 이상");
        }

        // PDO instance
        $conn = my_db_conn();

        // 데이터 조회!!
        $arr_prepare = [
            "id" => $id
        ];

        $result = my_board_select_id($conn, $arr_prepare);
    } else {
        // post처리

        // parm setting ↓        
        // id획득
        $id = isset($_POST["id"]) ?  (int)$_POST["id"] : 0;
        if ($id < 1) {
            throw new Exception("파라미터 오류");
        }

        // pdo instance
        $conn = my_db_conn();

        //transaction start
        $conn->beginTransaction();

        $arr_prepare = [
            "id" => $id
        ];
        // 삭제처리
        my_board_delete_id($conn, $arr_prepare);

        // commit
        $conn->commit();

        // 리스트페이지 이동
        header("Location: /");
        exit;
    }
} catch (Throwable $th) {
    if (!is_null($conn) && $conn->inTransaction()) {
        $conn->rollBack();
    }

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
    <link rel="stylesheet" href="./css/delete.css">

    <title>삭제페이지</title>
</head>

<body>
    <?php
    require_once(MY_PATH_ROOT . "header.php");
    ?>
    <main>
        <div class="title-message">
            <p> 삭제하면 영구적으로 복구할 수 없습니다.</p>
            <p>정말로 삭제 하시겠습니까?</p>
        </div>
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
                <form action="/delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $result["id"] ?>">
                    <button type="submit" class="btn-small">삭제</button>
                    <a href="/detail.php?id=<?php echo $result["id"] ?>&page=<?php echo $page ?>"><button type="button" class="btn-small">취소</button></a>
                </form>
            </div>
        </div>
    </main>
</body>

</html>