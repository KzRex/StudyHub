<?php

namespace App\Repository;

use App\Contracts\Repo\TeacherRepoInterface;
use App\Models\Teacher;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class TeacherRepo implements TeacherRepoInterface
{
    public function __construct(
        private readonly Teacher $model
    ){
    }

    /**
     * Get a teacher by ID.
     *
     * @param int $id
     * @return Teacher|null
     */
    public function getById(int $id): ?Teacher
    {
        try {
            return $this->model->where('id', $id)->first();
        } catch (Exception $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    /**
     * Retrieve all teachers.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        try {
            return $this->model->get();
        } catch (Exception $th) {
            Log::error($th->getMessage());
            return collect();
        }
    }

    /**
     * Store a new teacher record.
     *
     * @param array $data
     * @return Teacher|null
     */
    public function store(array $data): ?Teacher
    {
        DB::beginTransaction();
        try {
            $teacher = $this->model->create($data);
            DB::commit();
            return $teacher;
        } catch (Exception $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return null;
        }
    }

    /**
     * Update an existing teacher record.
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
     * Delete a teacher record.
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