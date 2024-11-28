<?php

namespace App\Http\Controllers;

use App\Exceptions\MyAuthException;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use MyToken;

class AuthController extends Controller
{
    public function login(UserRequest $request){
    // 유저 정보획득
        $userInfo = User::where('account',$request->account)
                    ->withCount('boards')
                    ->first();
                    // 여기서 [비밀번호]에러난 이유는 User::where('account',$request->account)->first();했는데 아래에 또 해서이다
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

     /**토큰재발급처리
     *  @param Illuminate\Http\request $request
     *  @return response JSON */


     public function reissue(Request $request){
        // 페이로드에서 유저pk획득
        $userId = MyToken::getValueInPayload($request->bearerToken(), 'idt');
        
        // 유저 정보획득
        $userInfo = User::find($userId);

        // 리프레쉬 토큰 비교
        if($request->bearerToken() !== $userInfo->refresh_token){
            throw new MyAuthException('E22');
        }

        // 토큰 발급
        list($accessToken, $refreshToken) = MyToken::createTokens($userInfo);

        // 리프레쉬토큰 저장 -> 리프래시하는 이유는 노션 참조
        MyToken::updateRefreshToken($userInfo, $refreshToken);
        $responseData = [
            'success' => true
            ,'msg' => '토큰 재발급 성공'
            ,'accessToken' => $accessToken
            ,'refreshToken' => $refreshToken
        ];

        return response()->json($responseData, 200);

    }


}
