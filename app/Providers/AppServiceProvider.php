<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Project;
use App\Models\Review;

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
        $recs = Project::all();

        view()->share('recs', $recs);
        view()->share('revs', $revs);
    }
}
