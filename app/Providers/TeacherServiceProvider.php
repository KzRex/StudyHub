<?php

namespace App\Providers;

use App\Contracts\Repo\TeacherRepoInterface;
use App\Repository\TeacherRepo;
use Illuminate\Support\ServiceProvider;

class TeacherServiceProvider extends ServiceProvider
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
        $this->app->bind(TeacherRepoInterface::class, TeacherRepo::class);
    }
}
