<?php

namespace App\Repository;

use App\Contracts\Repo\ClassroomRepoInterface;
use App\Models\Classroom;
use Illuminate\Support\Collection;

class ClassroomRepo implements ClassroomRepoInterface
{
    public function __construct(
        private readonly Classroom $model
    ){
    }

    public function getById(int $id): Classroom
    {
        return $this->model
            ->where('id', $id)
            ->first();
    }

    public function getAll(): Collection
    {
        return $this->model
            ->get();
    }

    public function store(array $data): Classroom
    {
        return $this->model
            ->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->model
            ->where('id', $id)
            ->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->model
            ->where('id', $id)
            ->delete();
    }
}