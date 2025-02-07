<?php

namespace App\Contracts\Service;

use App\Models\Classes;
use Illuminate\Support\Collection;

interface ClassroomServiceInterface
{
    public function getById(int $id): Classes;

    public function getAll(): Collection;

    public function store(array $data): Classes;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}