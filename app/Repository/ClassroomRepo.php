<?php

namespace App\Repository;

use App\Contracts\Repo\ClassroomRepoInterface;
use App\Models\Classes;
use Illuminate\Support\Collection;

class ClassroomRepo implements ClassroomRepoInterface
{
    public function __construct(
        private readonly Classes $model
    ){
    }

    public function getById(int $id): Classes
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

    public function store(array $data): Classes
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