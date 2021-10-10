<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TenancyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $env = app(\Hyn\Tenancy\Environment::class);
        if ($fqdn = optional($env->hostname())->fqdn) {
            config(['database.default' => 'tenant']);
        }
                
        return $next($request);
    }
}
