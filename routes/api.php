<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test\StudentController;
use App\Http\Controllers\Projects\ProjectsController;
use App\Http\Controllers\DataProjects\DataProjectsController;
use App\Http\Controllers\DataProjects\ProjectProtocolController;

// Include routes
include base_path('routes/route/Student.php');
include base_path('routes/route/Project.php');
include base_path('routes/route/DataProject.php'); 
include base_path('routes/route/ProjectProtocol.php'); 


// Rest of your routes...

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rest of your routes...
