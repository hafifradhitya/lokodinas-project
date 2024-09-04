<?php

namespace App\Providers;

use App\Http\Controllers\PesanmasukController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Share latest messages with all views
        View::composer('*', function ($view) {
            $pesanmasukController = new PesanmasukController();
            $latestMessages = $pesanmasukController->getLatestMessages();
            $view->with('latestMessages', $latestMessages);
        });
    }
}
