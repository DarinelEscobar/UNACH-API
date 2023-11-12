<?php
// \routes\route\DataProject.php

use App\Http\Controllers\DataProjects\DataProjectsController;
use Illuminate\Support\Facades\Route;

Route::prefix('DataProject')->group(function () {
    Route::get('/{id}', [DataProjectsController::class, 'getById']);
    Route::post('/', [DataProjectsController::class, 'post']);
    Route::put('/{id}', [DataProjectsController::class, 'putById']);
});
