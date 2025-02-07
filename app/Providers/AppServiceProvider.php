<?php

namespace App\Providers;

use App\Contracts\Repo\ClassroomRepoInterface;
use App\Contracts\Repo\StudentRepoInterface;
use App\Contracts\Repo\SubjectRepoInterface;
use App\Contracts\Repo\TeacherRepoInterface;
use App\Contracts\Service\ClassroomServiceInterface;
use App\Contracts\Service\StudentServiceInterface;
use App\Contracts\Service\SubjectServiceInterface;
use App\Contracts\Service\TeacherServiceInterface;
use App\Repository\ClassroomRepo;
use App\Repository\StudentRepo;
use App\Repository\SubjectRepo;
use App\Repository\TeacherRepo;
use App\Services\ClassroomService;
use App\Services\StudentService;
use App\Services\SubjectService;
use App\Services\TeacherService;
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
    public function boot(): void
    {
        //Repos
        $this->app->bind(TeacherRepoInterface::class, TeacherRepo::class);
        // $this->app->bind(StudentRepoInterface::class, StudentRepo::class);
        $this->app->bind(ClassroomRepoInterface::class, ClassroomRepo::class);
        $this->app->bind(SubjectRepoInterface::class, SubjectRepo::class);

        //Services
        $this->app->bind(TeacherServiceInterface::class, TeacherService::class);
        // $this->app->bind(StudentServiceInterface::class, StudentService::class);
        $this->app->bind(ClassroomServiceInterface::class, ClassroomService::class);
        $this->app->bind(SubjectServiceInterface::class, SubjectService::class);
    }
}
