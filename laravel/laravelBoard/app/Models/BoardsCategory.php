<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardsCategory extends Model
{
    // 여기서는 model 외 소프트 딜리트를 비롯한 use를 사용하는게 없다
    protected $table = 'boards_category';

    protected $primarykey = 'bc_id';

    protected $fillable = [
        'bc_id'
        ,'bc_type'
        ,'bc_name'
    ];

}
