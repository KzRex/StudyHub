<?php

namespace App\Services;

use App\Contracts\Repo\TeacherRepoInterface;
use App\Contracts\Service\TeacherServiceInterface;
use App\Models\Teacher;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TeacherService implements TeacherServiceInterface
{
    public function __construct(
        private readonly TeacherRepoInterface $teacherRepo
    ){
    }

    public function getById(int $id): Teacher
    {
        return $this->teacherRepo->getById($id);
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->teacherRepo->getAll();
    }

    public function store(array $data): Teacher
    {
        return $this->teacherRepo->store($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->teacherRepo->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->teacherRepo->delete($id);
    }
}