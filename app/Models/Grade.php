<?php

//UNACH-API\app\Models\Grades.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_assignment_id',
        'project_id',
        'professor_id',
        'grade',
        'comments',

        'format_criteria',
        'plagiarism',
        'language_evaluation',
        'citation_evaluation',
        // ... otros criterios de forma

        'concise_project_summary',
        'clear_objectives',
        'academic_language',
        'precise_conclusion',
        'unforeseen_situations',
        'evident_contribution',
        'academic_production',
        'collaborative_work',
        'well_written_report',
    ];
}
