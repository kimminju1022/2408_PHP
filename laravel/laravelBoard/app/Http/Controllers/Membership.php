<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;

class Membership extends Controller{
    public function goMember(){
        return view('goMember');
    }
    
    public function member(){
        return view('member');

    }

    

}

