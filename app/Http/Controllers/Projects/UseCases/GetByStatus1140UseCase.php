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

        // BCM: Iterar sobre los proyectos y obtener los IDs de profesores asignados
        foreach ($projects as $project) {
            $professorIds = ProjectAssignments::where('project_id', $project->id)->pluck('professor_id')->toArray();

            // BCM: Agregar los IDs de profesores al objeto del proyecto
            $project->professor_ids = $professorIds;
        }

        if ($projects->count() > 0) {
            return ['status' => 200, 'data' => ['projects' => $projects]];
        } else {
            $message = null;
            return ['status' => 200, 'data' => ['projects' => $message]];
        }
    }
}
