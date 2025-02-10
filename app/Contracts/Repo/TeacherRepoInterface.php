<?php

namespace App\Contracts\Repo;

use App\Models\Teacher;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface TeacherRepoInterface
{
    public function getById(int $id): ?Teacher;

    public function getAll(): LengthAwarePaginator;

    public function store(array $data): ?Teacher;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}