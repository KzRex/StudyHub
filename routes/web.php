<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::post('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');
Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{id}', [TeacherController::class, 'delete'])->name('teachers.delete');
