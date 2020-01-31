<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;

class CompanyToken
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
        $token  = $_SERVER['HTTP_AUTHORIZATION'];
        $companyTest=DB::table('company')
            ->where('remember_token', '=', $token)
            ->get();
        if(count($companyTest) === 0){
            return response('Uppps algo ocurrio');
        }else{
            return $next($request);

        }
    }
}
