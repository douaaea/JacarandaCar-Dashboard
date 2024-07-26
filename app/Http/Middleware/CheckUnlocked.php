<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUnlocked
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
        if (!$request->session()->has('unlocked') || $request->session()->get('unlocked') !== true) {
            return redirect()->route('profile.lockscreen');
        }

        return $next($request);
    }
}
