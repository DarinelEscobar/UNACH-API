<?php

// UNACH-API\app\Http\Controllers\Grades\UseCases\PutGradeUseCase.php
namespace App\Http\Controllers\Grades\UseCases;

use App\Models\Grade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PutGradeUseCase
{
    public function execute($id, array $data)
    {
        $validator = Validator::make($data, [
            'grade' => 'nullable|integer|min:0', 
            'comments' => 'nullable|string', 
            'format_criteria' => ['nullable', Rule::in(['Adecuado', 'Inadecuado'])],
            'plagiarism' => ['nullable', Rule::in(['Adecuado', 'Inadecuado'])],
            'language_evaluation' => ['nullable', Rule::in(['Adecuado', 'Inadecuado'])],
            'citation_evaluation' => ['nullable', Rule::in(['Adecuado', 'Inadecuado'])],
            'concise_project_summary' => ['nullable', Rule::in(['Adecuado', 'Inadecuado'])],
            'clear_objectives' => ['nullable', Rule::in(['Adecuado', 'Inadecuado'])],
            'academic_language' => ['nullable', Rule::in(['Adecuado', 'Inadecuado'])],
            'precise_conclusion' => ['nullable', Rule::in(['Adecuado', 'Inadecuado'])],
            'unforeseen_situations' => ['nullable', Rule::in(['Adecuado', 'Inadecuado'])],
            'evident_contribution' => ['nullable', Rule::in(['Adecuado', 'Inadecuado'])],
            'academic_production' => ['nullable', Rule::in(['Adecuado', 'Inadecuado'])],
            'collaborative_work' => ['nullable', Rule::in(['Adecuado', 'Inadecuado'])],
            'well_written_report' => ['nullable', Rule::in(['Adecuado', 'Inadecuado'])],
        ]);

        if ($validator->fails()) {
            return ['status' => 422, 'error' => $validator->messages()];
        }

        $grade = Grade::find($id);

        if (!$grade) {
            return ['status' => 404, 'error' => 'Grade not found'];
        }

        $grade->update($data);

        return ['status' => 200, 'message' => 'Grade updated successfully', 'data' => $grade];
    }
}
