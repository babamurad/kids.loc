<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Проверяем, авторизован ли пользователь и его тип
        if ($request->user() && ($request->user()->type === 'ADM' || $request->user()->type === 'TCH')) {
            return $next($request);
        }

        // Если пользователь не авторизован или не имеет тип 'ADM', выполняем действие по умолчанию (например, редирект или вывод ошибки)
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
