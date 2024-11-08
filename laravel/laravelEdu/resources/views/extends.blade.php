{{-- 상속 --}}
@extends('layout.layout')

{{-- @section : 부모 템플릿에 해당하는 yield에 삽입하는 코드다 --}} 
@section('title','자식입니다')

{{-- 메인의 내용을 자식요소에 추가한다 --}}
{{-- @section('main','<h1>자식요소의 메인입니다</h1>') @section으로 열고 @endsection으로 닫아 많은 정보를 전달할 때 쓴다 아래처럼 작성--}}
@section('main')
<main>
    <h2>자식의 메인 영역입니다</h2>
</main>
@endsection

@section('show','자식자식show')
<hr>
{{-- 명단 리스트 가져오기 --}}
{{-- @if ㅣ 조건문 --}}
@if ($data[0]['gender']==='f')
<span>여자</span>
@elseif ($data[0]['gender']==='m')
<span>남자</span>
@else
<span>알수 없음</span>

@endif
<hr>
{{-- 반복문 for/ --}}
@for ($i = 0; $i < 5; $i++)
    <span>{{$i}}</span>
@endfor

<hr>

@for ($x = 1; $x < 10; $x++)
    @for($y = 2; $y < 10; $y++)
    <span> {{$y .'x'.$x.' = ' .($y*$x)}} <br></span>
    @endfor 
    {{-- for안의 for는 똑같이 @for여야 한다 --}}
@endfor

{{-- @foreach ~ @endforeach : foreach --}}
@foreach ($data as $item)
    @if($loop->odd)
        <div style = "color:red">
            <span>{{$item['name']}}</span>
            <span>{{$item['gender']}}</span>
            {{-- 정보가 없는 값을 지정 --}}
            {{-- <span>남은 루프 횟수 : {{$loop->remaining}}</span> --}}
            </div>
    @else
        <div style = "color:blue">
            <span>{{$item['name']}}</span>
            <span>{{$item['gender']}}</span>
        </div>
    @endif
@endforeach

{{-- @for ($i=1; $i<=5; $i++)
    @for($j=0;$j<=10; $j++)
        @if($j<=(5-$i) || $j>=(5+$i)
            <div style = "color:red">
                <span>{{($j+$i)}}</span>
            </div>
            @else
                <div>
                    *
                </div>
        @endif
    @endfor 
@endfor  --}}
{{-- △엔드이프가 문제 --}}


@forelse ($data2 as $item)
    <div>{{$item['name']}}</div>
@empty
    <span>데이터 없음</span>
@endforelse
