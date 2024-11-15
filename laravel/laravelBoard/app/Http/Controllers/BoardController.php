<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Throwable;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request)
        //보드의 여러 게시판 이동 ->리스트 페이지 를 표시하는 것으로 이동하는 액션 매소드
        {
            // 게시글 타입획득
            $bcType = '0';
            if($request->has('bc_type')){
                $bcType = $request->bc_type;
                // bstype에 맞추어 받아오되 없으면 0을 셋팅하도록 함
            }

            // list 데이터 가져오는 방법-게시글의 리스트만 가져옴 =등호는 생략가능
            // 데이터 저장 변수
            $result =Board::select('b_id','b_title','b_content','b_img')
                            ->where('bc_type',$bcType)
                            ->orderby('created_at','DESC')
                            ->orderby('b_id','DESC')
                            ->get();

            // 게시판 이름획득
            $boardInfo = BoardsCategory::where('bc_type', $bcType)->first();
            
            // 위에서 선언한 리저트의 값을 받아 출력한다 bladetaplet에 data를 정의
            return view('boardList')
                    ->with('data',$result)
                    ->with('boardInfo',$boardInfo);

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    //작성페이지로 이동하는 것이다
    {
        // $result=Board::SELECT('bc_type','u_id','b_title','b_content','b_img')
        //                 ->
        // var_dump($request);
        // exit;
        // bc_type이 변수명이기 때문에 createBoard에서 $bc_type으로 사용가능하다
        return view('createBoard')->with('bc_type',$request->bc_type);
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
        // 유효성 체크
        // 1.안을 할 땐 require삭제하고 하기 작성하고 인
        $request->validate([
            'b_title'=>['required','between:1,50']
            ,'b_content'=>['required','between:1,200']
            ,'file'=>['required','image']
            ,'bc_type'=>['required','exists:boards_category,bc_type']
        ]);
        // $validator = Validator::make(
        //     $request->only('b_title','b_content','file')
        //     ,[
        //         'b_title'=>['required','between:1,50']
        //         ,'b_content'=>['required','between:1,200']
        //         ,'file'=>['required','image']
        //     ]
        // );
        // if($validator->fails()){
        //     return redirect()->route('boards.create')->withErrors($validator);
        $filePath = '';
        try{
            //파일 저장 _try catch시 기존 파일을 삭제하는 처리를 해주어야 한다 안그러면 쓰리게가 용량차지해~
            // 해서 catch에서 파일 삭제 처리해주어야 한다
            $filePath = $request->file('file')->store('img');
            DB::beginTransaction();
            // throw new Exeption('test');
            // 글작성처리
            $insertData = $request->only('b_title','b_content','bc_type');
            $insertData['b_img'] = '/'.$filePath;
            $insertData['u_id'] = Auth::id();
            Board::create($insertData);
            DB::commit();
        }catch(Throwable $th){
            DB::rollBack();
            // if(Storage::disk()->exists($filePath)){
            if(Storage::exists($filePath)){
                Storage::delete(($filePath));
            }
        }
        return redirect()->route('boards.index',['bc_type'=>$request->bc_type]);
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
        $responseData=$result->toArray();
        $responseData['delete_flg'] = $result->u_id ===Auth::id();
        // 위에서 미리 삭제에 fale값을 주었고 
        // $responseData['delete_flg'] = false;
        // if($result->u_id === Auth::id()){
        //     $responseData['delete_flg'] = true;
        // }
        return response()->json($responseData);

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
        $result = Board::destroy($id);
        $responseData = [
            'success'=>$result === 1 ? true : false
        ];
        return response()->json($responseData);
    }
}
