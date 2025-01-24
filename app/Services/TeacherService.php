<?php

use App\Contracts\Repo\TeacherRepoInterface;
use App\Contracts\Service\TeacherServiceInterface;
use Illuminate\Support\Collection;

class TeacherService implements TeacherServiceInterface
{
    public function __construct(
        private readonly TeacherRepoInterface $teacher
    ){
    }

    public function getAll(): Collection
    {
        return $this->teacher->getAll();
    }
}