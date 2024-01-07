<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckCurrentUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Проверяем, авторизован ли пользователь
        if (Auth::check()) {
            // Если авторизован, сохраняем пользователя в статической переменной
            User::setCurrentUser(Auth::user());

            dd(User::getCurrentUser());
            return $next($request);
        }

        return response(redirect(route('login')));

        return $next($request);
    }
}
