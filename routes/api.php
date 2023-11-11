<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test\StudentController;

// Include Student routes
include base_path('routes/route/Student.php');

// Rest of your routes...

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rest of your routes...
