<?php

namespace App\Http\Controllers;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function goLogin()
    {
        // 여기선 블레이드 템플릿 이름을 사용한다
        return view('login');
    }

    // 로그인 처리
    public function login(Request $request)
    {
        // 유효성 체크 - validation을 사용하기 위해 설정을 해야한다
        $validator = Validator::make(
            $request->only('u_email', 'u_password'),
            [
                // unique와 exists를 사용하면 편리하게 설정할 수 있다->validation에서 문구를 설정!
                'u_email' => ['required', 'email', 'exists:users,u_email'],
                'u_password' => ['required', 'between:9,20', 'regex:/^[a-zA-Z0-9!@]+$/']
            ]
        );
        // 유효성 실패 시 if를 실행
        if ($validator->fails()) {
            return redirect()
                ->route('goLogin')
                ->withErrors($validator->errors());
        }

        // 회원정보 획득
        // mj
        // $validator =UserFactory::get(
        //     $request->only('u_email','u_password'),
        //     [
        //         'u_'
        //     ]
        // )
        // prof
        $userInfo = User::where('u_email', '=', $request->u_email)->first();

        // 회원정보 체크
        // $errorMsg='';
        // if(is_null($userInfo)){
        // 비밀번호 체크
        if (!(Hash::check($request->u_password, $userInfo->u_password))) {
            return redirect()->route('goLogin')->withErrors('비밀번호가 일치하지 않습니다');
        }
        // 유저인증처리
        Auth::login($userInfo);
        
        // var_dump(Auth::id()); //로그인한 유저의 pk회득
        // var_dump(Auth::user());//로그인한 유저의 정보회득
        // var_dump(Auth::check());//유저의 로그인 여부 체크
        // Log::debug('ttt', $userInfo->toArray());
        // Log::debug('ttt', [Auth::check()]);
        // 리다이렉트 처리
        return redirect()->route('boards.index');    
    }
    // 로그아웃처리
    public function logout(){
        Auth::logout(); //로그아웃처리

        Session::invalidate(); //로그아웃 후 세션 아이디를 지우는 즉 초기화 하는 작업이며 새로운 session id발급
        // csrf 토큰은 사용되어 왔는데 이건 1회성이지만 로그인 후 삭제되어야 한다 그래서 새로운 세션 id를 생성한 후 로그인으로 이동
        Session::regenerateToken();
        return redirect()->route('goLogin');
    }
}
