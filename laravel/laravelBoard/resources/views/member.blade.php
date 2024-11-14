@extends('layout.layout')
@section('title','회원가입 페이지')
@section('bodyClassVh','vh-100')
@section('main')    


<main class="d-flex justify-content-center algin-items-center h-75">
    <form style="width: 300px" action={{route('post.member')}} method="post">
        @csrf
        {{-- 에러메세지 출력 --}}
        @if ($errors->any())
        <div id="M_error_Msg" class="form-text text-danger">
            {{-- 에러메세지 (중복아이디 검사)) --}}
            @foreach ($errors->all() as $errorMsg)
                <span>{{$errorMsg}}</span>
                <br>
            @endforeach
        </div>
        @endif
        <div class="mb-3">
            <label for="u_email" class="form-label">아이디</label>
            <input type="email" class="form-control" id="u_email" name="u_email">
            {{-- 유효성 검사필요 --}}
        </div>
        
        <div class="mb-3">
            <label for="u_password" class="form-label">비밀번호</label>
            <input type="password" class="form-control" id="u_password" name="u_password">
        </div>
       
        <div class="mb-3">
            <label for="u_password_chk" class="form-label">비밀번호 확인</label>
            <input type="password" class="form-control" id="u_password_chk" name="u_password_chk">
            {{-- 비밀번호 일치 유효성검사 --}}
        </div>

        <div class="mb-3">
            <label for="u_name" class="form-label">이름</label>
            <input type="text" class="form-control" id="u_name" name="u_name" >
        </div>
        <button type="submit" class="btn btn-dark">가입하기</button>
        <a href="{{route('goLogin')}}" class="btn btn-primary">취소하기</a>
    </form>
    
</main>

@endsection