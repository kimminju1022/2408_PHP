<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function index(){
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
        
        // DB::update('UPDATE boards_category SET bc_name=? WHERE bc_type = ?',['미어켓게시판','3']);
        // 삭제
        // DB::delete('DELETE FROM boards_category WHERE bc_type = ?', ['3']);
        

        // 쿼리빌더 이용한 sql 작성
        // users테이블 내 모든 자료 조회  select*from users
        $result = DB::table('users')->get();

        var_dump($result);


        return'';
    }
}
