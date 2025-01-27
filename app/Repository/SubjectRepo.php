<?php

namespace App\Repository;

use App\Contracts\Repo\SubjectRepoInterface;
use App\Models\Subject;
use Illuminate\Support\Collection;

class SubjectRepo implements SubjectRepoInterface
{
    public function __construct(
        private readonly Subject $model
    ){
    }

    public function getById(int $id): Subject
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

    public function store(array $data): Subject
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