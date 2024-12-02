<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *authorize-인증체크용이다
     * @return bool
     */
     // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *rules - validation생성할 때 생긴 룰을 적으면 된다
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'account' => ['required','between:5,20', 'regex:/^[0-9a-zA-Z]+$/']
            ,'password' => ['required','between:5,20', 'regex:/^[0-9a-zA-Z!@]+$/']
        ];
        // 로그인
        if($this->routeIs('auth.login')){
            $rules['account'][]='exists:users,account';    
        } else if($this->routeIs('user.store')){
            // 회원가입
            $rules['account'][]='unique:users,account';
            $rules['password_chk']=['same:password'];
            $rules['name']=['required', 'between:1,20', 'regex:/^[가-힣]+$/'];
            $rules['gender']=['required','regex:/^[0-1]{1}$/'];
            $rules['profile']=['required','image'];
        }
        return $rules;
    }

    // failedValidation method는 유효성을 체크한다
    // └ Validator 객체에 있는 errors가 가지고 있는 에러메세지를 배열로 만들어 리턴하는 매소드다
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            // Validation에서 에러가 발생되어 걸린것
            'success' => false,
            'message' =>'유효성체크 오류입니다',
            'data' => $validator ->errors()
        ],422);
        // 이렇게 $response에 담은 데이터를 json형태로 반환해 줄 것이며, 본 에러 코드는 422에러 status code값을 지정하였다
        throw new HttpResponseException($response);
    }
}
