<?php

namespace App\Repository;

use App\Contracts\Repo\StudentRepoInterface;
use App\Models\Student;
use Illuminate\Support\Collection;

class StudentRepo implements StudentRepoInterface
{
    public function __construct(
        private readonly Student $model
    ){
    }

    public function getById(int $id): Student
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

    public function store(array $data): Student
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