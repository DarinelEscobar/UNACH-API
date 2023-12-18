<?php
// app\Http\Controllers\ProjectAssignments\UseCases\CreateUseCase.php

namespace App\Http\Controllers\ProjectAssignments\UseCases;

use App\Models\ProjectAssignments;
use Illuminate\Support\Facades\Validator;

class CreateUseCase
{
    public function execute(array $data)
    {
        $validator = Validator::make($data, [
            'project_id' => 'required|required|numeric',
            'professor_id' => 'required|required|numeric',
            // Agrega otras reglas de validación si es necesario
        ]);

        if ($validator->fails()) {
            return ['status' => 422, 'error' => $validator->messages(),'data' => $data];
        }

        try {
            $projectassignments = ProjectAssignments::create($data);

            return $projectassignments
                ? ['status' => 200, 'message' => 'projectassignments created successfully', 'data' => $projectassignments]
                : ['status' => 500, 'error' => 'Failed to create projectassignments. Please try again.'];
        } catch (\Exception $e) {
            \Log::error($e);

            return [
                'status' => 500,
                'error' => 'Something went wrong. Please contact support for assistance. Error: ' . $e->getMessage(),
            ];
        }
}
}
