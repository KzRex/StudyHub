<?php

namespace App\Services;

use App\Contracts\Repo\ClassroomRepoInterface;
use App\Contracts\Service\ClassroomServiceInterface;
use App\Models\Classes;
use Illuminate\Support\Collection;

class ClassroomService implements ClassroomServiceInterface
{
    public function __construct(
        private readonly ClassroomRepoInterface $classroomRepo
    ){
    }

    public function getById(int $id): Classes
    {
        return $this->classroomRepo->getById($id);
    }

    public function getAll(): Collection
    {
        return $this->classroomRepo->getAll();
    }

    public function store(array $data): Classes
    {
        return $this->classroomRepo->store($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->classroomRepo->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->classroomRepo->delete($id);
    }
}