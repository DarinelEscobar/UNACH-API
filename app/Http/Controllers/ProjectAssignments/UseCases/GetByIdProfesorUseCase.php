<?php

// app\Http\Controllers\ProjectAssignments\UseCases\GetByIdProfesorUseCase.php
namespace App\Http\Controllers\ProjectAssignments\UseCases;

use App\Models\ProjectAssignments;

class GetByIdProfesorUseCase
{
    public function execute($professor_id)
    {
        try {
            $assignedProjects = ProjectAssignments::where('professor_id', $professor_id)->with('project')->get();

            if ($assignedProjects->count() > 0) {
                $formattedProjects = $this->formatProjects($assignedProjects);
                return $this->successResponse(['assignedProjects' => $formattedProjects]);
            } else {
                $message = "No projects found for professor ID '{$professor_id}'";
                return $this->notFoundResponse(['error' => $message]);
            }
        } catch (\Exception $e) {
            \Log::error($e);

            return $this->errorResponse('Something went wrong. Please contact support for assistance. Error: ' . $e->getMessage());
        }
    }

    protected function formatProjects($assignedProjects)
    {
        $formattedProjects = [];

        foreach ($assignedProjects as $assignment) {
            $formattedProjects[] = [
                'id' => $assignment->id, // Cambiar por ID de asignación
                'project_id' => $assignment->project_id,
                'professor_id' => $assignment->professor_id,
                'created_at' => $assignment->created_at,
                'updated_at' => $assignment->updated_at,
                'unach_id' => $assignment->project->unach_id,
                'status' => $assignment->project->status,
                'comments' => $assignment->project->comments,
                'title_project' => $assignment->project->title_project,
                'start_date' => $assignment->project->start_date,
                'end_date' => $assignment->project->end_date,
                'student_name' => $assignment->project->student_name,
                'link_drive' => $assignment->project->link_drive,
                'project_created_at' => $assignment->project->created_at,
                'project_updated_at' => $assignment->project->updated_at,
            ];
        }

        return $formattedProjects;
    }

    protected function successResponse($data)
    {
        return ['status' => 200, 'data' => $data];
    }

    protected function notFoundResponse($data)
    {
        return ['status' => 404, 'data' => $data];
    }

    protected function errorResponse($message)
    {
        return ['status' => 500, 'error' => $message];
    }
}
