<?php
// app\Http\Controllers\ProjectAssignments\UseCases\GetByIdProjectUseCase.php
namespace App\Http\Controllers\ProjectAssignments\UseCases;

use App\Models\ProjectAssignments;

class GetByIdProjectUseCase
{
    public function execute($project_id)
    {
        try {
            $evaluators = ProjectAssignments::where('project_id', $project_id)->get();

            if ($evaluators->count() > 0) {
                return ['status' => 200, 'data' => ['evaluators' => $evaluators]];
            } else {
                $message = "No evaluators found for project ID '{$project_id}'";
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
