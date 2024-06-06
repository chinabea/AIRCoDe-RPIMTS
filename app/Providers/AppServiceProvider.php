<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Project;
use App\Models\Review;
use App\Models\Message;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Schema::defaultStringLength(200);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $revs = Review::all();
        $mes = Message::all();
        $recs = Project::all();

        view()->share('recs', $recs);
        view()->share('revs', $revs);
        view()->share('mes', $mes);

        // Check for the .authorized file
        if (!file_exists(base_path('config/.iamanauthorized'))) {
            abort(403, 'Resource not Available.');
        }
    }
}
