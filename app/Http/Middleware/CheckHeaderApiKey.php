<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckHeaderApiKey
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
        if($request->hasHeader('x-api-key')){
            $api_key = $request->header('x-api-key');
            if($api_key !== null || $api_key !== ""){
                return $next($request);
            }
        }
        return response(['Api token missing', 403]);
    }
}
