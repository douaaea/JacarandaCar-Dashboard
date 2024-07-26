<?php

namespace App\Providers;

use App\Models\Historique;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HistoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $histories = Historique::with('profile')->orderBy('created_at', 'desc')->get();

        // Share the data with all views
        View::share('histories', $histories);
    }
}
