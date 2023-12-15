<?php
// app/Http/Controllers/Projects/UseCases/PutStatusByIDUseCase.php

namespace App\Http\Controllers\Projects\UseCases;

use App\Models\Projects;

class PutStatusByIDUseCase
{
    public function execute(string $id, string $status, ?string $comments)
    {
        try {
            $project = Projects::find($id);

            if (!$project) {
                return ['status' => 404, 'error' => 'Project not found'];
            }

            $comments = $comments ?? '';

            if ($comments !== "") {
                $project->comments = "";
            }

            // Update project status
            $project->status = $status;
            $project->save();

            return ['status' => 200, 'message' => 'Status updated successfully'];
        } catch (\Exception $e) {
            \Log::error($e);

            return ['status' => 500, 'error' => 'Something went wrong. Please contact support for assistance.'];
        }
    }
}
