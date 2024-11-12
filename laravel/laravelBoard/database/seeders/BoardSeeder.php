<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //랜덤한 데이터 갯수지정
        Board::factory(100)->create();
        // 굉장한 양의 factory생성 시 나누어 생성할 수 있도록 하는 방법(총 5000개씩 70번 돌린다는 명령_이유 :컴터 느려져서)
        // for($i=0;$i<70;$i++){
        //     board::factory(5000)->create();
        // }
    }
}
