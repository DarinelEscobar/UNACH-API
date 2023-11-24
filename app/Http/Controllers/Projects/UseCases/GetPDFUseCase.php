<?php
// app/Http/Controllers/Projects/UseCases/GetPDFUseCase.php

namespace App\Http\Controllers\Projects\UseCases;

use App\Models\Projects;
use App\Models\DataProjects;
use App\Models\ProjectProtocol;

class GetPDFUseCase
{
    public function execute(string $id = null)
    {
        $concatInfo = [];
        if ($id) {
            // Obtener un solo proyecto sin ordenar
            $project = Projects::where('id', $id)->first();
            $dataProjects = DataProjects::where('id_projects', $id)->first();
            $projectProtocol = ProjectProtocol::where('id_projects', $id)->first();

            // Concatenar la información obtenida de cada tabla
            $concatInfo = array_merge(
                $project ? $project->toArray() : [],
                $dataProjects ? $dataProjects->toArray() : [],
                $projectProtocol ? $projectProtocol->toArray() : []
            );
        }

        // Comprobar si al menos uno de los resultados es válido
        if ($project || $dataProjects || $projectProtocol) {
            // Devolver la concatenación de la información
            return ['status' => 200, 'data' => ['ALL' => $concatInfo]];
        } else {
            $message = "No se encontró un proyecto con el ID '{$id}'";
            return ['status' => 404, 'data' => ['error' => $message]];
        }
    }
}
