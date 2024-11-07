<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>HOME</h1>
    
    <form action="/home" method="post">
        @csrf
        <button type="submit">POST</button>
    </form>
    <hr>
    <form action="/home" method="post">
        {{-- <input type="hidden" name="_method" value="delete"> 이걸 ▽처럼쓴다--}}
        @csrf
        @method('PUT')
        <button type="submit">PUT</button>
    </form>
    <hr>
    <form action="/home" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">delete</button>
    </form>
    <hr>
    <form action="/home" method="post">
        @csrf
        @method('PATCH')
        <button type="submit">PATCH</button>
    </form>


</body>
</html>