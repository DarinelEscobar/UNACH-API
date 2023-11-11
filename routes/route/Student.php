<?php

use App\Http\Controllers\Test\StudentController;
use Illuminate\Support\Facades\Route;

Route::prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index']);
    Route::post('/', [StudentController::class, 'store']);
    Route::get('/{id}', [StudentController::class, 'show']);
    Route::put('/{id}/edit',[StudentController::class, 'update']);
    Route::delete('/{id}/delete',[StudentController::class, 'delete']);
});
