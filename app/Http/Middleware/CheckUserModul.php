<?php

namespace App\Http\Middleware;

use App\Models\Usermodul;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserModul
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $modul)
    {
        $user = $request->user();
        $akses = Usermodul::where('id_session', $user->id_session)
                ->whereHas('modul', function ($query) use ($modul) {
                    $query->where('link', $modul);
                })
                ->count();

        if ($akses < 1 && $user->level != 'admin') {
            // Jika pengguna tidak memiliki akses dan bukan admin, redirect ke halaman error atau halaman lain
            return redirect('error_page');
        }

        return $next($request);
    }

}
