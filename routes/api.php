<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\API\StudentController;

Route::get('student', [StudentController::class, 'index'])->name('student.index');
Route::post('student', [StudentController::class, 'store'])->name('student.store');
Route::put('student/{id}', [StudentController::class, 'update'])->name('student.update');
Route::get('student/{student}', [StudentController::class, 'show'])->name('student.show');
Route::delete('student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

