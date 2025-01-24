<?php

namespace App\Providers;

use App\Contracts\Repo\TeacherRepoInterface;
use App\Contracts\Service\TeacherServiceInterface;
use App\Repository\TeacherRepo;
use Illuminate\Support\ServiceProvider;
use TeacherService;

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
    public function boot(): void
    {
        $this->app->bind(TeacherRepoInterface::class, TeacherRepo::class);

        $this->app->bind(TeacherServiceInterface::class, TeacherService::class);
    }
}
