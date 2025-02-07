<?php

namespace App\Services;

use App\Contracts\Repo\StudentRepoInterface;
use App\Contracts\Service\StudentServiceInterface;
use App\Models\Student;
use Illuminate\Support\Collection;

class StudentService implements StudentServiceInterface
{
    public function __construct(
        private readonly StudentRepoInterface $studentRepo
    ){
    }

    public function getById(int $id): ?Student
    {
        return $this->studentRepo->getById($id);
    }

    public function getAll(): Collection
    {
        return $this->studentRepo->getAll();
    }

    public function store(array $data): ?Student
    {
        return $this->studentRepo->store($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->studentRepo->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->studentRepo->delete($id);
    }
}