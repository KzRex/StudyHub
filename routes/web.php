<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Landing');
})->name('landing');

Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::post('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');
Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{id}', [TeacherController::class, 'delete'])->name('teachers.delete');

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::post('/students/create', [StudentController::class, 'create'])->name('teachers.create');
Route::put('/students/{id}/update', [StudentController::class, 'update'])->name('teachers.update');
Route::delete('/students/{id}/delete', [StudentController::class, 'delete'])->name('teachers.delete');

Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');