<?php
// app/Http/Controllers/ProjectProtocol/UseCases/PostProjectProtocolUseCase.php

namespace App\Http\Controllers\ProjectProtocol\UseCases;

use App\Models\ProjectProtocol;
use Illuminate\Support\Facades\Validator;

class PostProjectProtocolUseCase
{
    public function execute(array $data)
    {
        // Add validation rules for other fields as needed
        $validator = Validator::make($data, [
            'id_projects' => 'required', 
            'executive_summary' => 'string',
            'introduction' => 'string',
            'main_contribution' => 'string',
            'articulation_with_substantive_functions' => 'string',
            'theoretical_conceptual_framework' => 'string',
            'justification' => 'string',
            'research_question' => 'string',
            'general_objective' => 'string',
            'specific_objectives' => 'string', 
            'hypothesis_or_assumptions' => 'string',
            'methodological_design' => 'string',
            'participants_sample' => 'string',
            'techniques_instruments' => 'string',
            'materials' => 'string',
            'data_collection_procedure' => 'string',
            'procedure_for_analysis' => 'string',
            'risks_or_threats' => 'string',
            'ways_to_face_risks_and_threats' => 'string',
            'informed_consent' => 'string',
            'ethical_committees_bioethics_biosafety' => 'string',
            'infrastructure' => 'string',
            'resources' => 'string',
            'ethical_considerations' => 'string',
            'financial_breakdown' => 'string',
            'stages_and_activities' => 'string',
            'committed_research_products' => 'string',
            'references' => 'string',
        ]);

        if ($validator->fails()) {
            return ['status' => 422, 'error' => $validator->messages()];
        }

        $dataProject = ProjectProtocol::create($data);

        return $dataProject
            ? ['status' => 200, 'message' => 'Project Protocol creado exitosamente', 'data' => $dataProject]
            : ['status' => 500, 'error' => 'Algo salió mal al crear el ProjectProtocol'];
    }
}
