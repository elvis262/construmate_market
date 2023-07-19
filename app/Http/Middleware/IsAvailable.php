<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAvailable
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
        if($request->input('_key') != env('CONSTRUMATE_API_KEY')){
            return 'you\'re not available!!';
        }
        return $next($request);
    }
}
