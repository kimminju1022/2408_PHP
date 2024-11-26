<?php
namespace App\Utils;

use App\Exceptions\MyAuthException;
use MyEncrypt;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PDOException;

class MyToken {
    /**access Token, refresh Token생성
     * 
     * @param App\Models\User
     * @return Array[$accessToken, $refreshToken]
     */
    
     // public--------------------------
     public function createTokens(User $user){
        $accessToken = $this->createToken($user,env('TOKEN_EXP_ACCESS'));
        $refreshToken = $this->createToken($user, env('TOKEN_EXP_REFRESH'), false);

        return[$accessToken, $refreshToken];
    }

    // private--------------------------
    /**리프래쉬 토큰 업데이트 
     * @param App\Model\User $userInfo 유저 정보
     * @param string $refreshToken
     * 
     * @return bool true  */
    
    public function updateRefreshToken(User $userInfo, string|null $refreshToken){
        // 
        $userInfo->refresh_token = $refreshToken;
        // throw new PDOException(('E80'));
        // DB::beginTransaction();
        if(!($userInfo->save())){
            DB::rollBack();
            throw new PDOException('Error updateRefreshToken()');

        }
        // DB::commit();

        return true;
    }

    /**토큰 유효성 체크
     * @param    string$token 베어럴 토큰
     * @return   bool true
     */
    public function chkToken(string|null $token){
        Log::debug("*****************chkToken Start*****************");
        // 토큰 존재 유무체크
        if(empty($token)){
            throw new MyAuthException('E20');
        }

        // 토큰 위조검사
        list($header,$payload,$signiture) = $this->explodeToken($token);
        if(MyEncrypt::subSalt( $this->createSignature($header, $payload),env('TOKEN_SALT_LENGTH'))
         !== MyEncrypt::subSalt($signiture, env('TOKEN_SALT_LENGTH'))) {
            throw new MyAuthException('E22');
         }

        // 유효시간 검사
        if($this->getValueInPayload($token, 'exp') < time()){
            throw new MyAuthException('E21');
        }
        Log::debug("*****************chkToken End*****************");
        return true;
        
    }
    /**페이로드에서 해당하는 키의 값을 반환
     * @param   sting $token
     * @param   string $key
     * 
     * @return 페이로드에서 추출한 값     */

    public function getValueInPayload(string $token, string $key){
        // 토큰 분리
        list($header, $payload ,$signiture) = $this->explodeToken($token);
        $decodedPayload = json_decode(MyEncrypt::base64UrlDecode($payload));
        // 페이로드에 해당 키의 데이터가 있는지 체크
        if(empty($decodedPayload) ||  !isset($decodedPayload->$key)){
            throw new MyAuthException('E24');
        }

        return $decodedPayload->$key;
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
    /**토큰 분리
     * @param   string $token
     * @return  array $header, $payload, $signiture
     */
    private function explodeToken($token){
        $arrToken = explode('.',$token);
        // 토큰 분리 오류 체크
        if(count($arrToken) !== 3){
            throw new MyAuthException('E23');
        }

        return $arrToken;
    }
    
}