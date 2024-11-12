<?php

namespace Database\Factories;

use App\Models\BoardsCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
        // 미리 이미지 넣어주기
        $arrImg = [
            '/img/P_티끌.png'
            ,'/img/potato.webp'
            ,'/img/success.gif'
            ,'/img/Thedkwu.png'
            ,'/img/그만써.png'
            ,'/img/수고.gif'
            ,'/img/i16665425484.gif'

        ];
        $userInfo = User::inRandomOrder()->first();

        // $date = $this->faker->dateTimeBetween('-1 years');
        // 아래와 같이 작성하면 가입 이후 랜덤한 일자로 표기됨
        $date = $this->faker->dateTimeBetween($userInfo->created_at);

        return[
            'u_id' => $userInfo->u_id
            ,'bc_type' => BoardsCategory::inRandomOrder()->first()->bc_type
            ,'b_title' => $this->faker->realText(50)
            ,'b_content' => $this->faker->realText(200)
            ,'b_img' => Arr::random($arrImg)
            ,'created_at'=> $date
            ,'updated_at'=> $date
            // 이때 날짜는 가입일자에 기준해 계산하여 넣어야 하지만 본 파일에서는 1년 전 시점으로 랜덤하게 입력하게 됨
        ];
    }
}
