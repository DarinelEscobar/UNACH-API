<?php

use App\Http\Controllers\ProjectProtocol\ProjectProtocolController;
use Illuminate\Support\Facades\Route;

Route::prefix('ProjectProtocol')->group(function () {
    Route::get('/{id}', [ProjectProtocolController::class, 'getById']);
    Route::post('/', [ProjectProtocolController::class, 'post']);
    Route::put('/{id}', [ProjectProtocolController::class, 'putById']);
});
