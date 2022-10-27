<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserActivity
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
        if (Auth::guard('customer')->check())
        {
            $expireAt = Carbon::now()->addMinute(10);
            Cache::put('user_online_check' . Auth::guard('customer')->id(), true, $expireAt);
        }
        return $next($request);
    }
}
