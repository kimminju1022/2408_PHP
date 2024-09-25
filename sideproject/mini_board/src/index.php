<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php"); //config파일의 정보를 가져와 쓴다
require_once(MY_PATH_DB_LIB); //db_lib 파일의 정보를 가져와 쓴다

$conn = null;
$max_board_cnt = 0;
$max_page = 0;
try {
    //PDO instance
    $conn = my_db_conn();
    
    // max page  획득
    $max_board_cnt=my_board_total_conut($conn); //게시글 총 수 획득
    $max_page = (int)ceil($max_board_cnt / MY_LIST_COUNT); //maxpage획득

    // pagination 설정처리
    $page = isset($_GET["page"])? (int)$_GET["page"] : 1;
    $offset = ($page - 1) * MY_LIST_COUNT; 
    $start_page_button_number =(int)(floor(($page - 1) / MY_PAGE_BUTTON_COUNT ) * MY_PAGE_BUTTON_COUNT) +1; // 화면 표시 페이지 버튼 시작값
    $end_page_button_number = $start_page_button_number+(MY_PAGE_BUTTON_COUNT - 1);  //화면 표시 페이지 버튼 마지막값
    $end_page_button_number = $end_page_button_number>$max_page ? $max_page : $end_page_button_number; //maxpage초과시 유효페이지 qjxms akwlakr rkqt whwjf

    $end_page_button_number = $end_page_button_number > $max_page ? $max_page : $end_page_button_number;
    $prev_page_butoon_number = $page - 1 < 1 ? 1: $page -1; //이전 버튼
    $next_page_button_number = $page + 1 > $max_page ? $max_page : $page +1; //다음 버튼


    // prepared select처리
    $arr_prepare = [
        "list_cnt"  => MY_LIST_COUNT
        ,"offset"   => $offset
    ];

    //pagination
    $result = my_board_select_pagination($conn, $arr_prepare);
} catch (Throwable $th) {
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
    <title>listPage</title>
</head>

<body>
    <?php
    require_once(MY_PATH_ROOT."header.php");
    ?>

    <main>
        <div class="main-top">
            <a href="/insert.php">
                <button class="btn-middle">글 작성</button>
            </a>
        </div>
        <div class="main-list"></div>
        <div class="item list-head">
            <div>게시글 번호</div>
            <div>게시글 제목</div>
            <div>작성일자</div>
        </div>
        <?php foreach($result as $item) { ?>
        <div class="item list-contents">
            <div><?php echo $item["id"] ?></div>
            <div><a href="./detail.html"><?php echo $item["title"] ?></a></div>
            <div><?php echo $item["created_at"] ?></div>
        </div>
        <?php }?>
        
        <div class="main-footer">
            <?php if($page !== 1) { ?>
                <a href="/index.php?page=<?php echo $prev_page_butoon_number ?>"><button class="btn-small">이전</button></a>
            <?php } ?>
            <?php  
            
            ?>
            <?php for($i = $start_page_button_number; $i <= $end_page_button_number; $i++){?>
                <a href="/index.php?page=<?php echo $i ?>"><button class="btn-small <?php echo $page === $i ? "btn_seleted" : "" ?>"><?php echo $i ?></button></a>
            <?php } ?>            
            <?php if($page !== $max_page) { ?>
                <a href="/index.php?page=<?php echo $next_page_button_number ?>"><button class="btn-small">다음</button></a>
            <?php } ?>
            
            
        </div>
    </main>
</body>

</html>