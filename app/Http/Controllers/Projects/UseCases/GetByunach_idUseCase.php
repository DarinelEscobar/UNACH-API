<?php
// app/Http/Controllers/Projects/UseCases/GetByunach_idUseCase.php

namespace App\Http\Controllers\Projects\UseCases;

use App\Models\Projects;

class GetByunach_idUseCase
{
    public function execute(string $unach_id = null)
    {
        if ($unach_id) {
            $projects = Projects::where('unach_id', $unach_id)->get();
        } else {
            $projects = Projects::all();
        }

        if ($projects->count() > 0) {
            return ['status' => 200, 'data' => ['projects' => $projects]];
        } else {
            $message = "No se encontraron proyectos con el estado '{$unach_id}'";
            return ['status' => 200, 'data' => ['error' => $message]];
        }
    }
}
