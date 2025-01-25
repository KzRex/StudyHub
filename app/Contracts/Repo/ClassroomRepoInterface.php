<?php

namespace App\Contracts\Repo;

use App\Models\Classroom;
use Illuminate\Support\Collection;

interface ClassroomRepoInterface
{
    public function getById(int $id): Classroom;

    public function getAll(): Collection;

    public function store(array $data): Classroom;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}