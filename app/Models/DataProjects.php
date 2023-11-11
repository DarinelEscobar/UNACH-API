<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProjects extends Model
{
    use HasFactory;

    protected $table = 'data_projects';

    protected $fillable = [
        'id_projects',
        'unach_id',
        'proposal_elaboration_date',
        'location_execution',
        'project_execution_period_start',
        'project_execution_period_end',
        'weekly_hours',
        'full_name_technical_responsible',
        'affiliation_center',
        'email',
        'office_phone',
        'cellphone',
        'degree',
        'employment_status',
        'knowledge_area',
        'discipline',
        'specify',
        'specific_topic',
        'academic_body_name',
        'ca_status',
        'collaboration_networks',
        'specify_network_name',
        'collegiate_research_group_name',
        'formalization_instance',
        'research_line_to_develop',
        'funding_type',
        'institution_source',
        'call_program',
        'call_year',
        'call_link',
        'evaluating_instance',
        'allocation_resources_agreement',
        'total_amount_mexican_pesos',
        'rt_perspective',
        'rt_scope',
        'rt_specify',
        'work_group',
        'research_training_students',
        'participating_entities',
    ];

    protected $casts = [
        'work_group' => 'array',
        'research_training_students' => 'array',
        'participating_entities' => 'array',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
