<?php
use App\Http\Controllers\API\StudentController;

Route::get('/test-api-route', [StudentController::class, 'index']);
