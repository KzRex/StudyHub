<?php

namespace App\Contracts\Repo;

use App\Models\Teacher;
use Illuminate\Support\Collection;

interface TeacherRepoInterface
{
    public function getById(int $id): ?Teacher;

    public function getAll(): Collection;

    public function store(array $data): ?Teacher;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}