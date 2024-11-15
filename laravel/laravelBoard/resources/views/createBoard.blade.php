@extends('layout.layout')
@section('title','게시글작성 페이지')
@section('bodyClassVh','vh-100')
@section('main')    
    <link rel="stylesheet" href="/css/myCommon.css">

<main class="d-flex justify-content-center algin-items-center h-75">
    
    
    <form style="width: 300px" action="{{route('boards.store')}}" method="post" enctype="multipart/form-data">
        {{-- 새로운 게시물을 작성한 후 저장 버튼을 누르면, store 메서드가 호출되어 데이터베이스에 게시물 내용이 저장 --}}
        {{-- required 삭제했다~ 넣어라~ --}}
        @csrf
        {{-- 에러메세지 --}}
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
            <label for="b_title" class="form-label">제목</label>
            <input type="t_title" class="form-control" id="b_title" name="b_title" >
            
        </div>
        
        <div class="mb-3">
            <label for="b_content" class="form-label">내용</label>
            <input type="text" class="form-control" id="b_content" name="b_content" >
        </div>
       
        <div class="mb-3">
            <label for="file" class="form-label">이미지</label>
            <input type="file" name="file" >
        </div>
        <button type="submit" class="btn btn-dark">작성하기</button>
        <a href="{{route('boards.index')}}" class="btn btn-primary">뒤로가기</a>
        <input type="hidden" name="bc_type" value="{{ $bc_type }}">
    </form>

</main>
@endsection 