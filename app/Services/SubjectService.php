<?php

namespace App\Services;

use App\Contracts\Repo\SubjectRepoInterface;
use App\Contracts\Service\SubjectServiceInterface;
use App\Models\Subject;
use Illuminate\Support\Collection;

class SubjectService implements SubjectServiceInterface
{
    public function __construct(
        private readonly SubjectRepoInterface $subjectRepo
    ){
    }

    public function getById(int $id): Subject
    {
        return $this->subjectRepo->getById($id);
    }

    public function getAll(): Collection
    {
        return $this->subjectRepo->getAll();
    }

    public function store(array $data): Subject
    {
        return $this->subjectRepo->store($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->subjectRepo->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->subjectRepo->delete($id);
    }
}