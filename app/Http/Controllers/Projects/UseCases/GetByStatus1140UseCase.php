<?php

// app/Http/Controllers/Projects/UseCases/GetByStatus1140UseCase.php

namespace App\Http\Controllers\Projects\UseCases;

use App\Models\Projects;
use App\Models\ProjectAssignments;

class GetByStatus1140UseCase
{
    public function execute()
    {
        // BCM: Obtener proyectos con status 1140
        $projects = Projects::where('status', 1140)->orderBy('updated_at', 'desc')->get();

        // BCM: Inicializar dos arreglos para proyectos
        $projectsToReturn = [];
        $projectsAlreadyAssigned = [];

        // BCM: Iterar sobre los proyectos
        foreach ($projects as $project) {
            $professorIds = ProjectAssignments::where('project_id', $project->id)->pluck('professor_id')->toArray();

            // BCM: Agregar los IDs de profesores al objeto del proyecto
            $project->professor_ids = $professorIds;

            // BCM: Verificar la cantidad de profesores asignados
            if (count($professorIds) < 3) {
                // BCM: Agregar a proyectos con menos de 3 profesores asignados
                $projectsToReturn[] = $project;
            } else {
                // BCM: Agregar a proyectos ya asignados a 3 profesores o más
                $projectsAlreadyAssigned[] = $project;
            }
        }

        // BCM: Retornar ambos conjuntos de proyectos
        return [
            'status' => 200,
            'data' => [
                'projects' => $projectsToReturn,
                'projectsAlreadyAssigned' => $projectsAlreadyAssigned,
            ],
        ];
    }
}
