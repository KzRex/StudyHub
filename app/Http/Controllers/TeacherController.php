<?php

namespace App\Http\Controllers;

use App\Contracts\Service\TeacherServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct(
        private readonly TeacherServiceInterface $teacherService
    ){    
    }

    public function getAll(): JsonResponse
    {
        $teachers = $this->teacherService->getAll();
        if (empty($teachers)) {
            return response()->json(['message' => 'Teachers not found'], JsonResponse::HTTP_NOT_FOUND);
        }

        return response()->json(['data' => $teachers], JsonResponse::HTTP_OK);
    }
}
