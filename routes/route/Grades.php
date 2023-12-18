<?php

use App\Http\Controllers\Grades\GradesController;
use Illuminate\Support\Facades\Route;

Route::prefix('Grades')->group(function () {
    Route::get('/', [GradesController::class, 'getById']);
    Route::post('/', [GradesController::class, 'post']);
    Route::put('/', [GradesController::class, 'putById']);
});
