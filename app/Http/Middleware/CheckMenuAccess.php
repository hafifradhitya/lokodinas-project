<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckMenuAccess
{
    public function handle(Request $request, Closure $next, $menu)
    {
        $user = Auth::user();
        if (in_array($menu, $user->menu_access ?? []) || $user->role === 'admin') {
            return $next($request);
        }
        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke menu ini.');
    }
}