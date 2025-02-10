<?php

namespace App\Repository;

use App\Contracts\Repo\StudentRepoInterface;
use App\Models\Student;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentRepo implements StudentRepoInterface
{
    public function __construct(
        private readonly Student $model
    ){
    }

    /**
     * Get a student by ID.
     *
     * @param int $id
     * @return Student|null
     */
    public function getById(int $id): ?Student
    {
        try {
            return $this->model->where('id', $id)->first();
        } catch (Exception $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    /**
     * Retrieve all students.
     *
     * @return Collection
     */
    public function getAll(): LengthAwarePaginator
    {
        try {
            return $this->model->paginate(10);
        } catch (Exception $th) {
            Log::debug($th->getMessage());
            return collect();
        }
    }

    /**
     * Store a new student record.
     *
     * @param array $data
     * @return Student|null
     */
    public function store(array $data): ?Student
    {
        DB::beginTransaction();
        try {
            $student = $this->model->create($data);
            DB::commit();
            return $student;
        } catch (Exception $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return null;
        }
    }

    /**
     * Update an existing student record.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        DB::beginTransaction();
        try {
            $updated = $this->model->where('id', $id)->update($data);
            DB::commit();
            return (bool) $updated;
        } catch (Exception $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return false;
        }
    }

    /**
     * Delete a student record.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        DB::beginTransaction();
        try {
            $deleted = $this->model->where('id', $id)->delete();
            DB::commit();
            return (bool) $deleted;
        } catch (Exception $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return false;
        }
    }
}
