<?php

// CreateStudentUseCase.php

namespace App\Http\Controllers\Test\UseCases;

use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class CreateStudentUseCase
{
    public function execute(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:100',
            'password' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return ['status' => 422, 'error' => $validator->messages()];
        }

        $student = Student::create([
            'name' => $data['name'],
            'password' => $data['password'],
        ]);

        return $student
            ? ['status' => 200, 'message' => 'Created Successfully']
            : ['status' => 500, 'error' => 'Something went wrong'];
    }
}
