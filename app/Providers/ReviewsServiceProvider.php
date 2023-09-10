<?php

namespace App\Providers;

use App\Models\ReviewModel;
use Illuminate\Support\ServiceProvider;

class ReviewsServiceProvider extends ServiceProvider
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
        // Fetch all projects from the database
        $revs = ReviewModel::all();
        view()->share('revs', $revs);
    }
}
