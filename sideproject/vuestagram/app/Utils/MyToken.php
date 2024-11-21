<?php
namespace App\Utils;

use MyEncrypt;
use App\Models\User;

class MyToken {
    /**access Token, refresh Token생성
     * 
     * @param App\Models\User
     * @return Array[$accessToken, $refreshToken]
     */
    public function createTokens(User $user){
        $accessToken = $this->createToken($user,env('TOKEN_EXP_ACCESS'));
        $refreshToken = $this->createToken($user, env('TOKEN_EXP_REFRESH'), false);

        return[$accessToken, $refreshToken];
    }

    /**JWT 생성
     * 
     * @param App\Model\User\ $user
     * @param int #ttl
     * @param bool $accessFlg = true
     * 
     * @return string JWT
     */
    private function createToken(User $user, int $ttl, bool $accessFlg = true){
        $header =$this->createHeader();
        $payload = $this->createPayload($user, $ttl, $accessFlg);
        $signiture = $this->createSignature($header, $payload);
        
        return $header.'.'.$payload.'.'.$signiture;
    }
    /**JWT Header 생성
     * 
     * @return string base64UrlEncode
     */
    private function createHeader(){
        $header =[
            'alg' => env('TOKEN_ALG')
            ,'typ' => env('TOKEN_TYPE')
        ];
        return MyEncrypt::base64UrlEncode(json_encode($header));
    }
    /**JWT 생성
     * 
     * @param App\Model\User\ $user
     * @param int #ttl
     * @param bool $accessFlg = true
     * @return string JWT
     */
    private function createPayload(User $user, int $ttl, bool $accessFlg = true){
        $now = time();
        // 페이로드 기본 데이터 생성
        $payload = [
            'idt' => $user->user_id
            ,'iat' => $now
            ,'exp' => $now + $ttl
            ,'ttl' => $ttl
        ];
        // 엑세스 토큰일 경우 아래 데이터 추가
        if($accessFlg){
            $payload['acc'] = $user->account;
        }
        return MyEncrypt::base64UrlEncode(json_encode($payload));
    }  
     /**JWT 시그니처 작성
     * 
     * @param   string $header
     * @param   string $payload
     
     * @return   string base64Signiture
     */      
    private function createSignature(string $header, string $payload){
        return MyEncrypt::hashWithSalt(env('TOKEN_ALG')
        ,$header.env('TOKEN_SECRET_KEY').$payload
        ,MyEncrypt::makeSalt(env('TOKEN_SALT_LENGTH'))
    );
    }
}