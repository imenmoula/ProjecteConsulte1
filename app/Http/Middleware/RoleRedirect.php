<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
        $role = Auth::user()->role;

        switch ($role) {
            case 'user':
                return redirect()->route('front.home');
            case 'expert':
                return redirect()->route('Expert.interface');
            case 'admin':
                return redirect()->route('dashboard');
            default:
                return redirect('/');
        }
    }

 return $next($request);

    
}
}