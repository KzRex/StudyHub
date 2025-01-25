<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'studyhub'], function () {
    // Teacher routes group
    Route::controller(App\Http\Controllers\TeacherController::class)->group(function () {
        Route::get('/teachers', 'index')->name('teachers.list');
        Route::post('/teacher/create', 'create')->name('teachers.create');
        Route::get('/teacher/{id}', 'show')->name('teacher.detail');
        Route::put('teacher/update/{id}', 'update')->name('teacher.update');
        Route::delete('teacher/delete/{id}', 'delete')->name('teacher.delete');
    });

    // Student routes group
    Route::controller(App\Http\Controllers\StudentController::class)->group(function () {
        Route::get('/students', 'index')->name('students.list');
        Route::post('/student/create', 'create')->name('students.create');
        Route::get('/student/{id}', 'show')->name('student.detail');
        Route::put('student/update/{id}', 'update')->name('student.update');
        Route::delete('student/delete/{id}', 'delete')->name('student.delete');
    });

     // Class routes group
     Route::controller(App\Http\Controllers\ClassroomController::class)->group(function () {
        Route::get('/classes', 'index')->name('classes.list');
        Route::post('/class/create', 'create')->name('class.create');
        Route::get('/class/{id}', 'show')->name('class.detail');
        Route::put('class/update/{id}', 'update')->name('class.update');
        Route::delete('class/delete/{id}', 'delete')->name('class.delete');
    });
});
