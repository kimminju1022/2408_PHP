<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
/** 11.26 수정 사유: 이미지 파일 확장자명이 상이하여 랜덤한 더미 데이터 삽입불가로 문제 해결을 위해 수정
 * 배열로 데이터를 담아 값을 돌려준다 */
        $images = [
            'lala.gif'
            ,'logo.png'
        ];

        $user = User::select('user_id')->inRandomOrder()->first();
        return [
            'user_id' => $user->user_id,
            'content' => $this->faker->realText(rand(10, 100)),
            'img' => '/img/'.$images[rand(0,1)],
            'like' => rand(1,300),
        ];
    }
}
