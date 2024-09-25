<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php"); //config파일의 정보를 가져와 쓴다
require_once(MY_PATH_DB_LIB); //db_lib 파일의 정보를 가져와 쓴다

$conn = null;

// try catch
try {

} catch (Throwable $th) {

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
    <header>
        <h1> Mini Board</h1>
    </header>
    <main>
        <div class="title-message">
            <p> 삭제하면 영구적으로 복구할 수 없습니다. <br>정말로 삭제 하시겠습니까?</p>
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
                <a href="/index.php?id=<?php echo $result["id"] ?>&page=<?php echo $page ?>"><button type="button" class="btn-small">삭제</button></a>
                <a href="/detail.php?id=<?php echo $result["id"] ?>&page=<?php echo $page ?>"><button type="button" class="btn-small">취소</button></a>
            </div>
        </div>
    </main>
</body>

</html>