<?php

namespace App\Http\Middleware;


use Closure;

class Cors
{
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
<<<<<<< HEAD
            ->header('Access-Control-Allow-Methods', 'GET', 'POST', 'PUT', 'DELETE', 'OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type', 'Authorization');
=======
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization, x-www-form-urlencoded');
>>>>>>> 9da27eddeb0e15dec749dcf57b6a3cfc95bef79e
    }
}
