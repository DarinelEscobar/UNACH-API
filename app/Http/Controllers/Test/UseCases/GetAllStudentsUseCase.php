<?php 

// GetAllStudentsUseCase.php

namespace App\Http\Controllers\Test\UseCases;

use App\Models\Student;

class GetAllStudentsUseCase
{
    public function execute()
    {
        $students = Student::all();

        return $students->count() > 0
            ? ['status' => 200, 'data' => ['students' => $students]]
            : ['status' => 404, 'error' => 'Empty table'];
    }
}
