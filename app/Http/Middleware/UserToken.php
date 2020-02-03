<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;

class UserToken
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {

        $token = $_SERVER['HTTP_AUTHORIZATION'];
        $userTest=DB::table('users')
            ->where('remember_token', '=', $token)
            ->get();

        if(count($userTest) === 0){
            return response('Las cosas no salieron bien');
        }else{
            return $next($request);

        }
    }
}
