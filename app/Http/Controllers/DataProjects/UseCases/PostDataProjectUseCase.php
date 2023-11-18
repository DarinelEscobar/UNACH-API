<?php
// app/Http/Controllers/DataProjects/UseCases/PostDataProjectUseCase.php

namespace App\Http\Controllers\DataProjects\UseCases;

use App\Models\DataProjects;
use Illuminate\Support\Facades\Validator;

class PostDataProjectUseCase
{
    public function execute(array $data)
    {
       
        $validator = Validator::make($data, [
            'id_projects' => '',
            'unach_id' => 'string|max:255',
            // 'proposal_elaboration_date' => 'date',
            'location_execution' => 'string|max:50',
            // 'project_execution_period_start' => 'date',
            // 'project_execution_period_end' => 'date|after_or_equal:project_execution_period_start',
            'weekly_hours' => 'integer',
            'full_name_technical_responsible' => 'string|max:255',
            'affiliation_center' => 'string|max:100',
            'email' => 'email|max:200',
            'office_phone' => 'integer|digits_between:1,15',
            'cellphone' => 'integer|digits_between:1,15',
            'degree' => 'string|max:50',
            'employment_status' => 'string|max:100',
            'knowledge_area' => 'string|max:150',
            'discipline' => 'string|max:100',
            'specify' => 'string|max:100',
            'specific_topic' => 'string|max:100',
            'academic_body_name' => 'string|max:255',
            'ca_status' => 'string|max:50',
            'collaboration_networks' => 'string|max:150',
            'specify_network_name' => 'string|max:255',
            'collegiate_research_group_name' => 'string|max:100',
            'formalization_instance' => 'string|max:100',
            'research_line_to_develop' => 'string|max:100',
            'funding_type' => 'string|max:100',
            'institution_source' => 'string|max:150',
            'call_program' => 'string|max:200',
            'call_year' => 'integer|min:1900',
            'call_link' => 'string|max:255',
            'evaluating_instance' => 'string|max:100',
            'allocation_resources_agreement' => 'string|max:255',
            'total_amount_mexican_pesos' => 'numeric|between:0,9999999.99',
            'rt_perspective' => 'string|max:100',
            'rt_scope' => 'string|max:100',
            'rt_specify' => 'string|max:200',
            'work_group' => 'string',
            'research_training_students' => 'string',
            'participating_entities' => 'string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return ['status' => 422, 'error' => $validator->messages()];
        }

        // Create the DataProjects instance
        $dataProject = DataProjects::create($data);

        return $dataProject
            ? ['status' => 200, 'message' => 'Proyecto de datos creado exitosamente', 'data' => $dataProject]
            : ['status' => 500, 'error' => 'Algo salió mal al crear el proyecto de datos'];
    }

}
