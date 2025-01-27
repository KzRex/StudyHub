<?php

namespace App\Contracts\Service;

use App\Models\Subject;
use Illuminate\Support\Collection;

interface SubjectServiceInterface
{
    public function getById(int $id): Subject;

    public function getAll(): Collection;

    public function store(array $data): Subject;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}