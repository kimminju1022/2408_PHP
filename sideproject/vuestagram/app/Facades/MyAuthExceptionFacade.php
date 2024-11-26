<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Facade;

class MyAuthExceptionFacade extends Facade{
    protected static function getFacadeAccessor() {
        return 'MyAuthException';
    }
}
