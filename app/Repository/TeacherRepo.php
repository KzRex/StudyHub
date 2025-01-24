<?php

namespace App\Repository;

use App\Contracts\Repo\TeacherRepoInterface;
use App\Models\Teacher;
use Illuminate\Support\Collection;

class TeacherRepo implements TeacherRepoInterface
{
    public function __construct(
        private readonly Teacher $model
    ){
    }

    public function getAll(): Collection
    {
        return $this->model
        ->get();
    }
}