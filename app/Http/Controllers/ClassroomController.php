<?php

namespace App\Http\Controllers;

use App\Contracts\Service\ClassroomServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function __construct(
        private readonly ClassroomServiceInterface $classroomService
    ){    
    }

    public function getAll(): JsonResponse
    {
        $classes = $this->classroomService->getAll();
        if (empty($classes)) {
            return response()->json(['message' => 'Classes not found'], JsonResponse::HTTP_NOT_FOUND);
        }

        return response()->json(['data' => $classes], JsonResponse::HTTP_OK);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'teacher_id' => 'required|integer',
            'subject_id' => 'required|integer',
            'class_name' => 'required|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        $storeData = $this->classroomService->store($validated);
        if (empty($storeData)) {
            return response()->json(['message' => 'Failed to store class data'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json(['data' => 'Store class data successfully'], JsonResponse::HTTP_OK);
    }

    public function show(string $id): JsonResponse
    {
        $classroom = $this->classroomService->getById($id);
        if (empty($classroom)) {
            return response()->json(['message' => 'Failed to get class data'], JsonResponse::HTTP_NOT_FOUND);
        }

        return response()->json(['data' => $classroom]. JsonResponse::HTTP_OK);
    }

    public function update(string $id, Request $request): JsonResponse
    {
        $validated = $request->validate([
            'teacher_id' => 'required_without_all:subject_id,classname,start_date,end_date|integer',
            'subject_id' => 'required_without_all:teacher_id,classname,start_date,end_date|integer',
            'classname' => 'required_without_all:teacher_id,subject_id,start_date,end_date|string|max:50',
            'start_date' => 'required_without_all:teacher_id,subject_id,classname,end_date|date',
            'end_date' => 'required_without_all:teacher_id,subject_id,classname,start_date|date'
        ]);

        $updateData = $this->classroomService->update($id, $validated);
        if (!$updateData) {
            return response()->json(['message' => 'Failed to update data'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json(['data' => 'Update data successfully'], JsonResponse::HTTP_OK);
    }

    public function delete(string $id): JsonResponse
    {
        $classroom = $this->classroomService->getById($id);
        if (empty($classroom)) {
            return response()->json(['message' => 'Failed to get class data'], JsonResponse::HTTP_NOT_FOUND);
        }

        $deleteData = $this->classroomService->delete($classroom->id);
        if (!$deleteData) {
            return response()->json(['message' => 'Failed to delete'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json(['data' => 'Delete data successfully'], JsonResponse::HTTP_OK);
    }
}
