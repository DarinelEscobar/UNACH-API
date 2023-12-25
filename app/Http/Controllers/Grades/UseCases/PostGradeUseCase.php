<?php
// app/Http/Controllers/Grades/UseCases/PostGradeUseCase.php
namespace App\Http\Controllers\Grades\UseCases;

use App\Models\Grades;
use App\Models\Projects;
use App\Models\DataProjects;
use App\Models\ProjectProtocol;

use Illuminate\Support\Facades\Validator;

class PostGradeUseCase
{
    public function execute(array $data)
    {
        $validator = Validator::make($data, [
            'project_assignment_id' => 'required|numeric',
            'project_id' => 'numeric',
            'grade' => 'nullable|numeric',
            'comments' => 'nullable|string',
            'format_criteria' => 'in:Adecuado,Inadecuado',
            'plagiarism' => 'in:Adecuado,Inadecuado',
            'language_evaluation' => 'in:Adecuado,Inadecuado',
            'citation_evaluation' => 'in:Adecuado,Inadecuado',
            'concise_project_summary' => 'in:Adecuado,Inadecuado',
            'clear_objectives' => 'in:Adecuado,Inadecuado',
            'academic_language' => 'in:Adecuado,Inadecuado',
            'precise_conclusion' => 'in:Adecuado,Inadecuado',
            'unforeseen_situations' => 'in:Adecuado,Inadecuado',
            'evident_contribution' => 'in:Adecuado,Inadecuado',
            'academic_production' => 'in:Adecuado,Inadecuado',
            'collaborative_work' => 'in:Adecuado,Inadecuado',
            'well_written_report' => 'in:Adecuado,Inadecuado',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return ['status' => 422, 'error' => $validator->messages()];
        }

        // Create the Grade instance
        $grade = Grades::create($data);

        if ($grade->project_id) {
            $projects = Projects::where('id', $grade->project_id)->first();
            $dataprojects = DataProjects::where('id_projects', $grade->project_id)->first();
            $projectprotocol = ProjectProtocol::where('id_projects', $grade->project_id)->first();
            
            // Check if data is found before attempting to call toArray()
            $projects = $projects ? $projects->toArray() : [];
            $dataprojects = $dataprojects ? $dataprojects->toArray() : [];
            $projectprotocol = $projectprotocol ? $projectprotocol->toArray() : [];
            
            // Use array_merge to combine arrays
            $grade->data_project = $projects + $dataprojects + $projectprotocol;
        }

        return $grade
            ? ['status' => 200, 'message' => 'Calificación creada exitosamente', 'data' => $grade]
            : ['status' => 500, 'error' => 'Algo salió mal al crear la calificación'];
    }
}
