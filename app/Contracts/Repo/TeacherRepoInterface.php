<?php

namespace App\Contracts\Repo;

use Illuminate\Support\Collection;

interface TeacherRepoInterface
{
    public function getAll(): Collection;
}