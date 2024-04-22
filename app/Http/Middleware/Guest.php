<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Guest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
            $user = User::where('id_user', $_COOKIE['id'])->first();
            if (Hash('sha256', $user->username) === $_COOKIE['key']) {
                return redirect('/');
            }
        }
        return $next($request);
    }
}
