<?php

namespace App\Contracts\Service;

use App\Models\Teacher;
use Illuminate\Support\Collection;

interface TeacherServiceInterface
{
    public function getById(int $id): Teacher;

    public function getAll(): Collection;

    public function store(array $data): Teacher;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}