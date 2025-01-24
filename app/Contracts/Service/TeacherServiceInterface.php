<?php

namespace App\Contracts\Service;

use Illuminate\Support\Collection;

interface TeacherServiceInterface
{
    public function getAll(): Collection;
}