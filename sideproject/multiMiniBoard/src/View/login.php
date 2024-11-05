<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../bootstrap/css/myCommon.css">
    <title>Document</title>
</head>

<body class="vh-100">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">미니보드</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>

    <main class="d-flex justify-content-center algin-items-center h-75">
        <form style="width: 300px" action="./free.html">
            <div id="error-Msg" class="form-text text-danger">※ 아이디를 확인하여 입력하세요 ※</div>
            <div class="mb-3">
                <label for="id" class="form-label">아이디</label>
                <input type="email" class="form-control" id="id" name="id">

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">비밀번호</label>
                <input type="password" class="form-control" id="password" name="pw">
            </div>
            <button type="button" class="btn btn-dark w-100 mb-3">로그인</button>
            <a href="./regist.html" class="btn btn-secondary w-100">회원가입</a>
        </form>

    </main>

    <!-- footer -->
    <footer class="fixed-bottom bg-dark text-light text-center p-3">저작권</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>