<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDU</title>
</head>
<body>
    {{-- 라우트 연결 --}}
    <h1>이거는 보입니다</h1>
    {{-- <h1>이거는 안보입니다</h1> --}}
    <p>{{ $data['name'] }}</p>
    <p>{{ $data['content'] }}</p>
    <p><?php echo htmlspecialchars($data['content'])?></p>
</body>
</html>