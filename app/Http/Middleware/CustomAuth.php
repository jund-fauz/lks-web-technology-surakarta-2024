<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('Authorization')) {
            $token = str_replace('Bearer ', '', $request->header('Authorization'));
            $token = explode('|', $token);
            $user = User::where('id_user', $token[0])->first();
            if ($user && Hash('sha256', $user->username) === $token[1]) {
                return $next($request);
            }
        }
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
