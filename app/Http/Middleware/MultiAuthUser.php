<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class MultiAuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, $userType): Response
    {


        if (Auth::check() && Auth::user()->role == $userType) {
            return $next($request);
        }

        return response()->json(['message' => 'You are not authorized to access this page!'], 403);
    }
}
