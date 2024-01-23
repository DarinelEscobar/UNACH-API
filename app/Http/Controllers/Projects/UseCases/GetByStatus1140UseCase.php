<?php

// app/Http/Controllers/Projects/UseCases/GetByStatus1140UseCase.php

namespace App\Http\Controllers\Projects\UseCases;

use App\Models\Projects;
use App\Models\ProjectAssignments;
use App\Models\Grade; //! Importar el modelo de calificaciones

class GetByStatus1140UseCase
{
    public function execute()
    {
        // BCM: Obtener proyectos con status 1140
        $projects = Projects::where('status', 1140)->orderBy('updated_at', 'desc')->get();

        // BCM: Inicializar arreglos para proyectos
        $projectsToReturn = [];
        $projectsAlreadyAssigned = [];
        $gradedProjects = []; //! Inicializar arreglo para proyectos calificados

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
                // BCM: Verificar si el proyecto ya fue calificado
                $isGraded = Grade::where('project_id', $project->id)->exists();

                if (!$isGraded) {
                    // BCM: Agregar a proyectos ya asignados, pero no calificados
                    $projectsAlreadyAssigned[] = $project;
                } else {
                    // BCM: Agregar a proyectos ya asignados y calificados
                    $gradedProjects[] = $project;
                }
            }
        }

        // BCM: Retornar los conjuntos de proyectos
        return [
            'status' => 200,
            'data' => [
                'projects' => $projectsToReturn,
                'projectsAlreadyAssigned' => $projectsAlreadyAssigned,
                'gradedProjects' => $gradedProjects, //! Agregar proyectos calificados al retorno
            ],
        ];
    }
}
