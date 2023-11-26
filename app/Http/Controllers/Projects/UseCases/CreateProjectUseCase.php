<?php
// app/Http/Controllers/Projects/UseCases/CreateProjectUseCase.php

namespace App\Http\Controllers\Projects\UseCases;

use App\Models\Projects;
use Illuminate\Support\Facades\Validator;

class CreateProjectUseCase
{
    public function execute(array $data)
    {
        $validator = Validator::make($data, [
            'unach_id' => 'required|string',
            'comments'=> 'string|max:300',
            'title_project' => 'string|max:250',
            'start_date' => 'date',
            'end_date' => 'date',
            'student_name' => 'string|max:100',
        ]);

        if ($validator->fails()) {
            return ['status' => 422, 'error' => $validator->messages()];
        }

        try {
            // Create the project
            $project = Projects::create([
                'unach_id' => $data['unach_id'],
                'status' => $data['status'],
                'comments' => isset($data['comments']) ? $data['comments'] : null,
                'title_project' => isset($data['title_project']) ? $data['title_project'] : null,
                'start_date' => isset($data['start_date']) ? $data['start_date'] : null,
                'end_date' => isset($data['end_date']) ? $data['end_date'] : null,
                'student_name' => isset($data['student_name']) ? $data['student_name'] : null,
                'link_drive' => isset($data['link_drive']) ? $data['link_drive'] : null,
            ]);
            

            // Retrieve the ID of the created project
            // $projectId = $project->id;

            return $project
                ? ['status' => 200, 'message' => 'Project created successfully', 'data' => $project]
                : ['status' => 500, 'error' => 'Failed to create project. Please try again.'];
        } catch (\Exception $e) {
            \Log::error($e);

            return [
                'status' => 500,
                'error' => 'Something went wrong. Please contact support for assistance. Error: ' . $e->getMessage(),
            ];
        }
    }
}
