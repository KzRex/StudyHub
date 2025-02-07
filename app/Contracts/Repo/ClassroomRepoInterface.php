<?php

namespace App\Contracts\Repo;

use App\Models\Classes;
use Illuminate\Support\Collection;

interface ClassroomRepoInterface
{
    public function getById(int $id): Classes;

    public function getAll(): Collection;

    public function store(array $data): Classes;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}