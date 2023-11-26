<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectProtocol extends Model
{
    use HasFactory;

    protected $table = 'project_protocol';

    protected $primaryKey = 'id_projects';

    protected $fillable = [
        'id_projects',
        'executive_summary',
        'introduction',
        'main_contribution',
        'articulation_with_substantive_functions',
        'theoretical_conceptual_framework',
        'justification',
        'research_question',
        'general_objective',
        'specific_objectives',
        'hypothesis_or_assumptions',
        'methodological_design',
        'participants_sample',
        'techniques_instruments',
        'materials',
        'data_collection_procedure',
        'procedure_for_analysis',
        'risks_or_threats',
        'ways_to_face_risks_and_threats',
        'informed_consent',
        'ethical_committees_bioethics_biosafety',

        'S1StarDate',
        'S1SEndDate',
        'S2StarDate',
        'S2SEndDate',
        'SA_1',
        'SA_2',

        'infrastructure',
        'resources',
        'ethical_considerations',
        'financial_breakdown',
        // 'stages_and_activities',
        'committed_research_products',
        'references',
    ];

    protected $casts = [
        'financial_breakdown' => 'array',
        'SA_1'=>'array',
        'SA_2'=>'array',
        // 'stages_and_activities' => 'array',
        'committed_research_products' => 'array',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
