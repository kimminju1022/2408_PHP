<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../View/css/myCommon.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="/View/js/board.js" defer></script>
    <title>Document</title>
</head>

<body>
    <!-- header -->
    <?php require_once('View/inc/header.php'); ?>

    <div class="text-center mt-5 mb-5">
        <h1><?php echo $this->getBoardName(); ?></h1>
        <!-- 글작성 버튼 js로 버튼 클릭이벤트 -->
        <svg id="btnInsert" value="<?php echo $this->boardType; ?>" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
            class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
        </svg>

        <!-- main -->
        <main>
            <?php foreach ($this->getArrBoardList() as $item) { ?>
                <div class="card">
                    <img src="<?php echo $item['b_img'] ?>" class="card-img-top object-fit-cover" style="height:300px;" alt="c_img">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['b_title'] ?></h5>
                        <p class="card-text"><?php echo $item['b_content'] ?></p>
                        <!-- button tigger modal -->
                        <button value="<?php echo $item['b_id']; ?>" type="button" class="btn btn-primary my-btn-detail" data-bs-toggle="modal" data-bs-target="#detailModal">눌러보세요</button>
                    </div>
                </div>
            <?php } ?>
        </main>
    </div>

    <!-- footer -->
    <footer class="fixed-bottom bg-dark text-light text-center p-3">저작권</footer>


    <!-- Modal item이 밖에서 왜 사용되는지 물어보기-->
    <div class="modal fade" id="detailModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalTitle">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align: center;">
                <p id ="modalUserName"></p>    
                <p id = "modalContent"></p>
                <img src ="" id="modalImg" style="width:200px; height: 200px;" class="card-img-top" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>