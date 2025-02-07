<?php

namespace App\Contracts\Repo;

use App\Models\Student;
use Illuminate\Support\Collection;

interface StudentRepoInterface
{
    public function getById(int $id): ?Student;

    public function getAll(): Collection;

    public function store(array $data): ?Student;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}