<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // protected function redirectTo(Request $request): ?string
    // {
    //     return $request->expectsJson() ? null : route('login');
    // }
    public function handle(Request $request, Closure $next) : Response {
        if(session()->get("isLogged")==null&&session()->get('userId')==null){
            return redirect()->route('auth.login')->with('error','Perlu Login terlebih dahulu');
        }

        return $next($request);
        
    }
}
