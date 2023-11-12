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
            'title_project' => 'required|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'student_name' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return ['status' => 422, 'error' => $validator->messages()];
        }

        try {
            $project = Projects::create([
                'unach_id' => $data['unach_id'],
                'status' => $data['status'],
                'title_project' => $data['title_project'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'student_name' => $data['student_name'],
                'link_drive' => $data['link_drive'],
            ]);

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
