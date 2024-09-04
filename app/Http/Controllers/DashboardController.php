<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Halamanbaru;
use App\Models\Agenda;
use App\Models\Manajemenmodul;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $berita['total_berita'] = Berita::count();
        $halamanbaru['total_halamanbaru'] = Halamanbaru::count();
        $agenda['total_agenda'] = Agenda::count();  
        $users['total_users'] = User::count();
        $user = User::where('username', session('username'))->first();

        if($user->level === 'admin'){
            $berita['total_berita'] = Berita::count();
            $halamanbaru['total_halamanbaru'] = Halamanbaru::count();
            $agenda['total_agenda'] = Agenda::count();
            $users['total_users'] = User::count();
            $user = User::where('username', session('username'))->first();
            $manajemenmodul = Manajemenmodul::all();

            $view = 'administrator.dashboard';
            return view($view, compact('manajemenmodul', 'berita', 'halamanbaru', 'agenda', 'users'));
        } elseif($user->level === 'kontributor') {
            $users['kontributor'] = $user;
            $view = 'administrator.dashkontributor';
        } else {
            $users['user'] = $user;
            $view = 'administrator.dashuser';
        }

        return view($view, compact('berita', 'halamanbaru', 'agenda', 'users'));
    }
}
