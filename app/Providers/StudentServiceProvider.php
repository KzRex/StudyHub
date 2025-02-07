<?php

namespace App\Providers;

use App\Contracts\Repo\StudentRepoInterface;
use App\Contracts\Service\StudentServiceInterface;
use App\Repository\StudentRepo;
use App\Services\StudentService;
use Illuminate\Support\ServiceProvider;

class StudentServiceProvider extends ServiceProvider
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
        $this->app->bind(StudentRepoInterface::class, StudentRepo::class);

        $this->app->bind(StudentServiceInterface::class, StudentService::class);
    }
}
