<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test\StudentController;
use App\Http\Controllers\Projects\ProjectsController;

// Include Student and projects routes
include base_path('routes/route/Student.php');
include base_path('routes/route/Project.php');

// Rest of your routes...

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rest of your routes...
