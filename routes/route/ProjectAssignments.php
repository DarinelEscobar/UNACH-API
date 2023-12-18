<?php

use App\Http\Controllers\ProjectAssignments\ProjectAssignmentsController;
use Illuminate\Support\Facades\Route;

Route::prefix('ProjectAssignments')->group(function () {
    Route::get('/get/{project_id}', [ProjectAssignmentsController::class, 'getByIdProject']);//Optendra a todos los evaluadores de un proyecto
    Route::post('/', [ProjectAssignmentsController::class, 'create']); //Creara un nuevoAssignmrnt recivienedo el el body el dato de id del proyecto y id del maestro
    Route::get('/{professor_id}', [ProjectAssignmentsController::class, 'getByIdProfesor']);//Obtener todos los projecto que un profesor calificara de la tabla  projects
});
