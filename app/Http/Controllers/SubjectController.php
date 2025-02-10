<?php

namespace App\Http\Controllers;

use App\Contracts\Service\SubjectServiceInterface;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;

class SubjectController extends Controller
{
    public function __construct(
        private readonly SubjectServiceInterface $subject
    ){
    }

    public function index()
    {
        $subjects = $this->subject->getAll();
        if (empty($subjects)) {
            return response()->json(['message' => 'Failed to get subjects', JsonResponse::HTTP_NOT_FOUND]);
        }

        return Inertia::render('Students/CreateTeacherModal', [
            'subjects' => $subjects
        ]);
    }
}