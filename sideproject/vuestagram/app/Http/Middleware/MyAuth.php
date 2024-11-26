<?php

namespace App\Http\Middleware;

use MyToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MyAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        Log::debug('MyAuth : '.$request->bearerToken());
        MyToken::chkToken($request->bearerToken());

        return $next($request);
    }
}
// 토큰의 유효성 체크를 해주기 위해 생성한 파일로 여기서는 토큰이 잘 오는지 확인하기 위해 로그를 찍어 본다