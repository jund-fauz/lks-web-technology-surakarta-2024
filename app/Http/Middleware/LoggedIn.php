<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoggedIn
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
                return $next($request);
            }
        }
        unset($_COOKIE);
        return redirect(route('login'));
    }
}
