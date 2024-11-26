<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Utils\MyToken as UtilsMyToken;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use MyToken;

class AuthController extends Controller
{
    public function login(UserRequest $request){
    // 유저 정보획득
        $userInfo = User::where('account',$request->account)->first()
                    ->withCount('boards')
                    ->first();
    // 비밀번호 체크
    if(!(Hash::check($request->password, $userInfo->password))){
        throw new AuthenticationException('비밀번호 체크 오류');
    }


    // 토큰발행
    list($accessToken,$refreshToken)=MyToken::createTokens($userInfo);
    
    // 리프레쉬 토큰 저장
    MyToken::updateRefreshToken($userInfo,$refreshToken);

    $responseData = [
        'success'=> true
        ,'msg' => '로그인 성공'        
        ,'accessToken' => $accessToken
        ,'refreshToken' => $refreshToken
        ,'data' => $userInfo->toArray()
    ];

    // refresh

        return response()->json($responseData,200);
    }

    /**로그아웃
     * @param Illuminate\Http\request $request
     * 
     * @return response JSON */

     public function logout(Request $request){
        // return $request->bearerToken();
        $id = MyToken::getValueInPayload($request->bearerToken(), 'idt');

        // 유저 정보 획득
        $userInfo = User::find($id);

        // 리프레쉬 토큰 갱신
        MyToken::updateRefreshToken($userInfo, null);
        $responseData = [
            'success'=> true
            ,'msg' => '로그아웃 성공'       
        ];

        return response()->json($responseData, 200);
     }


}
