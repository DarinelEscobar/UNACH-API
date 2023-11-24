<?php
// app/Http/Controllers/Projects/UseCases/GetProjetByIdProjectUseCase.php
// app/Http/Controllers/Projects/UseCases/GetProjetByIdProjectUseCase.php

namespace App\Http\Controllers\Projects\UseCases;

use App\Models\Projects;

class GetProjetByIdProjectUseCase
{
    public function execute(string $id = null)
    {
        if ($id) {
            // Obtener un solo proyecto sin ordenar
            $project = Projects::where('id', $id)->first();
        }

        if (isset($project)) {
            // Devolver solo el proyecto encontrado
            return ['status' => 200, 'data' => ['project' => $project]];
        } else {
            $message = "No se encontró un proyecto con el ID '{$id}'";
            return ['status' => 404, 'data' => ['error' => $message]];
        }
    }
}
