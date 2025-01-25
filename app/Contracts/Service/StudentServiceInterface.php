<?php

namespace App\Contracts\Service;

use App\Models\Student;
use Illuminate\Support\Collection;

interface StudentServiceInterface
{
    public function getById(int $id): Student;

    public function getAll(): Collection;

    public function store(array $data): Student;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}