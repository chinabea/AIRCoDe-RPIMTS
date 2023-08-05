<?php

namespace App\Providers;
use App\Models\ProjectsModel;

use Illuminate\Support\ServiceProvider;

class ProjectsServiceProvider extends ServiceProvider
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
        $projects = ProjectsModel::all();

        // Share the projects variable with all views
        view()->share('projects', $projects);
    }
}
