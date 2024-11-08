<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>보드다</title>
</head>
<body>
    {{-- 인크루드 문법 : 헤더와 푸터를 별도로 만들어 추가하자 @로 블레이드 부르기--}}
    {{-- .을 붙여 경로를 적을 수 있다 --}}
    @include('layout.header')
    
    <main>
        <p>메인입니다</p>
    </main>
        {{-- 푸터로 출력할 데이터 값 보내기 --}}
        @include('layout.footer',['key1'=>'홍길동'])    
</body>
</html>