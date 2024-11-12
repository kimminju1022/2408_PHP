@extends('layout.layout')
@section('title','로그인 페이지')

@section('bodyClassVh','vh-100')

@section('main')    

<main class="d-flex justify-content-center algin-items-center h-75">
    <form style="width: 300px" action="./free.html">
        <div id="error-Msg" class="form-text text-danger">아이디를 확인하여 입력하세요</div>
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
@endsection
