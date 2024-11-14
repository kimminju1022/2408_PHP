<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
        //보드의 여러 게시판 이동 ->리스트 페이지 를 표시하는 것으로 이동하는 액션 매소드
        {
            // list 데이터 가져오는 방법
            // 데이터 저장 변수
            $result =Board::select('b_id','b_title','b_content','b_img')
                            ->orderby('created_at','DESC')
                            ->orderby('b_id','DESC')
                            ->get();

            // 위에서 선언한 리저트의 값을 받아 출력한다 bladetaplet에 data를 정의
            return view('boardList')->with('data',$result);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    //작성페이지로 이동하는 것이다
    {
        //
        return view('createBoard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

// 작성완료페이지
     public function store(Request $request)
    {
        $insert
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    // 상세페이지 게시글로 이동한다
    {
        //작성된 값이 기록되게 한다 현재는 id값이 debug되게 해두었다 원래 사용 목적은 에러의 기록을 남기는 용이다
        // 디버그는 에러보다 낮은 레벨로 로그레벨을 사용하면 11:44분 내용 다시 듣고 작성!!!
        Log::debug('*****boards show start*****');
        Log::debug('request id : '.$id);
        
        // show의 action은 상세데이터를 만들어 보내주는 역할이다 해당 데이터를 탐색해 json파일로 출력한다
        $result = Board::find($id);

        //log는 2개의 param을 받는다 엘로컨트를 배열로 바꾸어 작성해 주어야 표기 된다$result->toArray() 
        Log::debug('획득 상세 데이터',$result->toArray());


        return response()->json($result->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    // 해당글의 수정페이지로 이동
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    // 기존 데이터를 새로운 데이터로 수정 정보 전달
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
