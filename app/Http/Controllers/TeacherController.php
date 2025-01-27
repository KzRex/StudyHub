<?php

namespace App\Http\Controllers;

use App\Contracts\Service\TeacherServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeacherController extends Controller
{
    public function __construct(
        private readonly TeacherServiceInterface $teacherService
    ){    
    }

    public function index()
    {
        $teachers = $this->teacherService->getAll();
        if (empty($teachers)) {
            return response()->json(['message' => 'Teachers not found'], JsonResponse::HTTP_NOT_FOUND);
        }
        
        return Inertia::render('Teachers/Index', [
            'teachers' => $teachers
        ]);
    }

    public function create(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'required|max:20',
            'address' => 'required|string|max:200',
            'date_of_birth' => 'required|date',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $storeData = $this->teacherService->store($validated);
        if (empty($storeData)) {
            return response()->json(['message' => 'Failed to store teacher data'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json(['data' => 'Store teacher data successfully'], JsonResponse::HTTP_OK);
    }

    public function show(string $id): JsonResponse
    {
        $teacher = $this->teacherService->getById($id);
        if (empty($teacher)) {
            return response()->json(['message' => 'Failed to get teacher data'], JsonResponse::HTTP_NOT_FOUND);
        }

        return response()->json(['data' => $teacher]. JsonResponse::HTTP_OK);
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

        $updateData = $this->teacherService->update($id, $validated);
        if (!$updateData) {
            return response()->json(['message' => 'Failed to update data'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json(['data' => 'Update data successfully'], JsonResponse::HTTP_OK);
    }

    public function delete(string $id): JsonResponse
    {
        $teacher = $this->teacherService->getById($id);
        if (empty($teacher)) {
            return response()->json(['message' => 'Failed to get teacher data'], JsonResponse::HTTP_NOT_FOUND);
        }

        $deleteData = $this->teacherService->delete($teacher->id);
        if (!$deleteData) {
            return response()->json(['message' => 'Failed to delete'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json(['data' => 'Delete data successfully'], JsonResponse::HTTP_OK);
    }
}
