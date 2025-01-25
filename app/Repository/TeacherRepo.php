<?php

namespace App\Repository;

use App\Contracts\Repo\TeacherRepoInterface;
use App\Models\Teacher;
use Illuminate\Support\Collection;

class TeacherRepo implements TeacherRepoInterface
{
    public function __construct(
        private readonly Teacher $model
    ){
    }

    public function getById(int $id): Teacher
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

    public function store(array $data): Teacher
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