<?php
//UNACH-API\app\Http\Controllers\Grades\UseCases\PutGradeUseCase.php
namespace App\Http\Controllers\Grades\UseCases;

use App\Models\Grades;
use Illuminate\Support\Facades\Validator;

class PutGradeUseCase  // Rename the use case
{
    public function execute($id, array $data)  // Add $id parameter
    {
        $validator = Validator::make($data, [
            // Validation rules similar to the PostGradeUseCase

            // Ensure you add any additional rules for the attributes you want to update
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return ['status' => 422, 'error' => $validator->messages()];
        }

        // Find the grade by ID
        $grade = Grades::find($id);

        // Check if the grade exists
        if (!$grade) {
            return ['status' => 404, 'error' => 'Grade not found'];
        }

        // Update the grade attributes
        $grade->update($data);

        return ['status' => 200, 'message' => 'Grade updated successfully', 'data' => $grade];
    }
}
