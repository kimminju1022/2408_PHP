<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable{
    /**trait 트레이트
     * [php에서 트레이트는 HasApiTokens, HasFactory, Notifiable 이렇게 세가지로 구성되어 
     * 있는데 이게 각각의 트레이트로 구성되어 있음 ]
     * 근데 이걸 정의해둔 트레이트라는 객체로 실행한다(트레이트는 다른 언어로는 불가) */
    // softdeletes 트레이트 : 해당 모델에 소프트 딜리트 적용하고 싶을 때 추가
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    // 테이블 명 정의하는 프로퍼티(디폴트는 모델명의 복수형)
    protected $table = 'users';

    // PK를 지정하는 프로퍼티
    protected $primaryKey = 'u_id';

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    // upsert 시 변경을 허용할 컬럼을 설정하는 프로퍼티 - 화이트 리스트
    protected $fillable = [
        'u_email'
        ,'u_password'
        ,'u_name'
        ,'created_at'
        ,'updated_at'
        ,'deleted_at'  
    ];

        // upsert 시 변경을 불허할 컬럼을 설정하는 프로퍼티 - 블랙 리스트
    // protected $guarded = [
    //     'id'
    // ];
}
