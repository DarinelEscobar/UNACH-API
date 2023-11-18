<?php

namespace App\Http\Controllers\Projects\UseCases;

use App\Models\Projects;
use Illuminate\Support\Facades\Validator;

class PutDataByIDUseCase
{
    public function execute(string $id, array $requestData)
    {
        // Validate the request data
        $validator = Validator::make($requestData, [
            'title_project' => 'nullable|string|max:250',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'student_name' => 'nullable|string|max:100',
            'link_drive' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return ['status' => 422, 'error' => $validator->messages()];
        }

        try {
            $project = Projects::find($id);

            if (!$project) {
                return ['status' => 404, 'error' => 'Project not found'];
            }

            // Update project data based on the request
            $project->fill($requestData);
            $project->save();

            return ['status' => 200, 'message' => 'Project updated successfully', 'data' => $project];
        } catch (\Exception $e) {
            \Log::error($e);

            return ['status' => 500, 'error' => 'Something went wrong. Please contact support for assistance.'];
        }
    }
}
