<?php

//http method get 요청 데이터를 받는 방법
// echo isset($_GET["id"])? $_GET["id"]:1; 
//삼항연산자 : 조건식 참일경우 거짓일 경우에 따라 값을 표시 / isset확인하기
var_dump($_GET);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name ="id" id="id">
        <br>
        <button type="submit">버튼</button>

    </form>

</body>
</html>