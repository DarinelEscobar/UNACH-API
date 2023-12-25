<?php
//UNACH-API\routes\route\Grade.php
use App\Http\Controllers\Grades\GradesController;
use Illuminate\Support\Facades\Route;

Route::prefix('grades')->group(function () {
    // Route::get('/', [GradesController::class, 'getById']);
    Route::put('/{id}', [GradesController::class, 'put']);
    Route::post('/', [GradesController::class, 'post']);
});
