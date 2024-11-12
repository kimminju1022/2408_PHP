<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class QueryController extends Controller
{
    public function index(Request $request){
    // 쿼리빌더------------소스코드 치듯이 작성 가능
        // 쿼리빌더 이용x sql 작성
        $result = DB::select('select * from users');   
        // var_dump($result); // result값이 잘 들어 갔는지 확인해봄
        $result = DB::select('select * FROM users WHERE u_email = :u_email',['u_email'=>'admin@admin.com']);
        // var_dump($result);
        // ↑email 주소가 admin@admin.com인걸 출력
        $result = DB::select('select * FROM users WHERE u_email = ?',['admin@admin.com']);
        // insert문
        // DB::insert('INSERT INTO boards_category(bc_type, bc_name) VALUES(?,?)',['3','테스트게시판']);
        // 업데이트
        // DB::update('UPDATE boards_category SET bc_name=? WHERE bc_type = ?',['미어켓게시판','3']);
        // 삭제
        // DB::delete('DELETE FROM boards_category WHERE bc_type = ?', ['3']);
        

        // 쿼리빌더 체이닝[쿼리빌더 이용한 sql 작성 *속도이슈가 있어 일반문으로 수정하는 경우가 있음]
        // users테이블 내 모든 자료 조회  select*from users
        //여기서 get을 실행매소드로 보며 다양한 실행매소드가 존재한다
        $result = DB::table('users')->get();

        // select*from users where name =? ['관리자'] <<get()매서드는 데이터를 가져온다는거야!!!!>>
        $result = DB::table('users')
                        ->where('u_name','=','관리자')
                        ->get();
        // select * from bards where bc_type = ? and b_id < ?['0',5] 이걸 쿼리빌더 체이닝하면 ↓
        $result = DB::table('boards')
                        ->where('bc_type','=','0')
                        ->where('b_id','<',5)
                        ->get();

        
        // select * from bards where bc_type = ? and b_id < ?['0',10] 이걸 쿼리빌더 체이닝하면 ↓
        $result = DB::table('boards')
                        ->where('bc_type','=','0')
                        ->where('b_id','<',10)
                        ->get();

        // select b_title, b_content from boards where b_id (?,?) [1,2]
        $result = DB::table('boards')
                        ->select('b_title','b_content')
                        ->whereIn('b_id',[1,2])
                        ->get();

        // select * from boards where deleted_at is null (null값 체크)
        $result = DB::table('boards')
                        ->whereNull('deleted_at')
                        ->get();
        
        // select * from users where year(created_at)=?['탐색년도']
        /**$result = DB::table('users')
                        ->where('crated_at','>='2024-01-01 00:00:00')
                            and('created_at','<=','2024-12-31 23:59:59')
                        ->get();   */
        $result = DB::table('users')
                        ->whereYear('created_at','=','2023')
                        ->get();

        // 게시판 별 갯수
        $result =DB::table('boards')
                        ->select('bc_type',DB::raw('COUNT(*) cnt'))
                        ->groupBy('bc_type')
                        ->get();

        /** Q 유사문제
         *  SELECT bc_type, COUNT(*) cnt FROM boards GROUP BY bc_type HAVING bc_type = '0' */
         $result =DB::table('boards')
                        ->select('bc_type',DB::raw('COUNT(*) cnt'))
                        ->groupBy('bc_type')
                        ->having('bc_type','=','0')
                        ->get();
                        
        // select bc_id, b_title FROM boards ORDER BY b_id LIMIT ? OFFSET ? [1,2] ☆asc생략가능
        $result =DB::table('boards')
                        ->select('b_id','b_title')
                        ->orderBy('b_id')
                        ->limit('1')
                        ->offset('2')
                        ->get();

        $requestData = [
            'u_id'=> 1
        ];
        $result =DB::table('users')
                        ->when($requestData['u_id'],function($query,$u_id){
                            $query->where('u_id','=',$u_id);
                        })
                        ->get();

    // 미삭제 글 중 제목에 자유 또는 질문이 포한되어 있는 게시글 검색
    // mj 답 탈락~!
    // $result =DB::table('boards')
    //                     ->select('b_title',DB::raw('COUNT(*) cnt'))
    //                     ->groupBy('b_title')
    //                     ->having('b_title','=','자유'||'질문')
    //                     ->get();
   
    // prof답
    // SELECT * FROM boards WHERE deleted_at IS NULL AND (b_title LIKE '%자유%'	OR b_title LIKE '%질문%')

        $result =DB::table('boards')
                        ->whereNull('deleted_at')
                        ->where(function($query){
                            $query->where('b_title','like','%자유%')
                                    ->orwhere('b_title','like','%질문%');
                        })
                        ->get();

        // first 레코드만 반환하라
        $result = DB::table('users')->first();
        
        // find($id)지정된 pk에 해당하는 레코드를 반환한다 - 나중에
        // $result=DB::table('users')->find(1,'u_id');

        // count() 쿼리 결과의 레코드 수를 반환
        $result = DB::table('users')->count();

        // insert
        // $result =DB::table('users')
        //                 ->insert([
        //                     'u_email' => 'kim@admin.com'
        //                     ,'u_password' => Hash::make('qwer1234')
        //                     ,'u_name' => '김영희'
        //                 ]);

        // update
        // $result =DB::table('users')
        //                 ->where('u_id','=',10)
        //                 ->update([
        //                     //영향받을 레코드의 수를 반환
        //                     'u_name'=>'김경희'
        //                 ]);

        // 삭제
        // $result =DB::table('users')
        //                 ->where('u_id','=',9)
        //                 ->delete();
        

        // [ Eloquent Model----------------- ]
        // User.php에서 파일 수정후 작업!!
        // $result = User::get();
        // $result = User::where('u_name','=','갑돌이')->first(); -이해 못함
        // $result = User::find(4);
        // $result->u_name='테스트입니다';

        // insert
        // $userInsert = new User();
        // $userInsert ->u_email = $request->u_email;
        // $userInsert ->u_password =Hash::make($request->u_password);
        // $userInsert ->u_name = $request->u_name;
        // $userInsert -> save();

        //update
        // $userUpdate = User::find(13);
        // $userUpdate -> u_name = '김철수';;
        // $userUpdate -> save();
        
        // delete
        // $userDelete = User::destroy(8);
        // 삭제된 데이터를 포함하여 검색하고 싶을때 
        // $result = User::withTrashed()->count();
        // 삭제된 데이터만 검색하고 싶을때
        // $result = User::onlyTrashed()->count();
        // 삭제된 데이터를 되살리고 싶을때-소프트 딜리트한것만 살아남
        // $result = User::where('u_id',8)->restore();

        var_dump($result);
        return'';
    }
}
