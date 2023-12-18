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
                return ['status' => 200, 'data' => ['assignedProjects' => $assignedProjects]];
            } else {
                $message = "No projects found for professor ID '{$professor_id}'";
                return ['status' => 404, 'data' => ['error' => $message]];
            }
        } catch (\Exception $e) {
            \Log::error($e);

            return [
                'status' => 500,
                'error' => 'Something went wrong. Please contact support for assistance. Error: ' . $e->getMessage(),
            ];
        }
    }
}
