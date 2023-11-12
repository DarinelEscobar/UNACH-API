<?php

use App\Http\Controllers\Projects\ProjectsController;
use Illuminate\Support\Facades\Route;

Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectsController::class, 'getByStatus']);
    Route::get('/unach_id', [ProjectsController::class, 'getByunach_id']);
    Route::put('/', [ProjectsController::class, 'modifyStatusByID']);
    Route::post('/', [ProjectsController::class, 'create']);
    
});


