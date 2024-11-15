<?php

namespace App\Providers;

use App\Models\BoardsCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MyViewProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // View::composer('*',function($view){
        View::composer(['boardList','createBoard'],function($view){
            $resertBoardCategoryInfo = BoardsCategory::orderBy('bc_type')->get();
            $view->with('myGlobalBoardsCategoryInfo',$resertBoardCategoryInfo);
        });
    }
}
