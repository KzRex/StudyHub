<?php

namespace App\Http\Controllers;

use App\Contracts\Service\StudentServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(
        private readonly StudentServiceInterface $studentService
    ){    
    }

    public function getAll(): JsonResponse
    {
        $students = $this->studentService->getAll();
        if (empty($students)) {
            return response()->json(['message' => 'Students not found'], JsonResponse::HTTP_NOT_FOUND);
        }

        return response()->json(['data' => $students], JsonResponse::HTTP_OK);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'required|max:20',
            'address' => 'required|string|max:200',
            'date_of_birth' => 'required|date',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $storeData = $this->studentService->store($validated);
        if (empty($storeData)) {
            return response()->json(['message' => 'Failed to store student data'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json(['data' => 'Store student data successfully'], JsonResponse::HTTP_OK);
    }

    public function show(string $id): JsonResponse
    {
        $student = $this->studentService->getById($id);
        if (empty($student)) {
            return response()->json(['message' => 'Failed to get student data'], JsonResponse::HTTP_NOT_FOUND);
        }

        return response()->json(['data' => $student]. JsonResponse::HTTP_OK);
    }

    public function update(string $id, Request $request): JsonResponse
    {
        $validated = $request->validate([
            'fullname' => 'required_without_all:email,phone,address,date_of_birth,subject_id|string|max:50',
            'email' => 'required_without_all:fullname,phone,address,date_of_birth,subject_id|email|unique:teachers,email',
            'phone' => 'required_without_all:fullname,email,address,date_of_birth,subject_id|max:20',
            'address' => 'required_without_all:fullname,email,phone,date_of_birth,subject_id|max:200',
            'date_of_birth' => 'required_without_all:fullname,email,phone,address,subject_id|date',
            'subject_id' => 'required_without_all:fullname,email,phone,address,date_of_birth|exists:subjects,id',
        ]);

        $updateData = $this->studentService->update($id, $validated);
        if (!$updateData) {
            return response()->json(['message' => 'Failed to update student data'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json(['data' => 'Update student data successfully'], JsonResponse::HTTP_OK);
    }

    public function delete(string $id): JsonResponse
    {
        $student = $this->studentService->getById($id);
        if (empty($student)) {
            return response()->json(['message' => 'Failed to get teacher data'], JsonResponse::HTTP_NOT_FOUND);
        }

        $deleteData = $this->studentService->delete($student->id);
        if (!$deleteData) {
            return response()->json(['message' => 'Failed to delete'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json(['data' => 'Delete data successfully'], JsonResponse::HTTP_OK);
    }
}
