@extends('layout.layout')
@section('title','로그인 페이지')
@section('bodyClassVh','vh-100')
@section('main')    


<main class="d-flex justify-content-center algin-items-center h-75">
    <form style="width: 300px" action="{{route('login')}}" method="post">
        @csrf
        {{-- 에러메세지 출력 --}}
        {{-- any()는 $errors에 에러메세지가 담겼는지의 유무를 확인하는 매서드 로 담겨있으면 true 없으면 false반환 --}}
        @if ($errors->any())
        <div id="error-Msg" class="form-text text-danger">
            {{-- 에러메세지 돌리기 --}}
            @foreach ($errors->all() as $errorMsg)
                <span>{{$errorMsg}}</span>
                <br>
            @endforeach
        </div>
        @endif
        <div class="mb-3">
            <label for="u_email" class="form-label">아이디</label>
            {{-- required가 보안성이 강화되는 것은 아니지만 검사는 해주자 입력이 누락되면 알림을 준다 --}}
            <input type="email" class="form-control" id="u_email" name="u_email">
            
        </div>
        <div class="mb-3">
            <label for="u_password" class="form-label">비밀번호</label>
            <input type="password" class="form-control" id="u_password" name="u_password">
        </div>
        <button type="submit" class="btn btn-dark w-100 mb-3">로그인</button>
        <a href="./regist.html" class="btn btn-secondary w-100">회원가입</a>
    </form>
    
</main>
@endsection
