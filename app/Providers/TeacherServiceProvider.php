<?php

namespace App\Providers;

use App\Contracts\Repo\TeacherRepoInterface;
use App\Contracts\Service\TeacherServiceInterface;
use App\Repository\TeacherRepo;
use App\Services\TeacherService;
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

        $this->app->bind(TeacherServiceInterface::class, TeacherService::class);
    }
}
