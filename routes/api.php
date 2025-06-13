<?php


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Get all students (GET)
Route::get('/students', [StudentController::class, 'index']);

// Create a new student (POST)
Route::post('/students', [StudentController::class, 'store']);

// Update a student (PUT)
Route::put('/students/{id}', [StudentController::class, 'update']);

// Delete a student (DELETE)
Route::delete('/students/{id}', [StudentController::class, 'destroy']);


Route::get('/test-api-route', [StudentController::class, 'index']);




