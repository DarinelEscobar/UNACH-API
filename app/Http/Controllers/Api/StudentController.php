<?php

namespace App\Http\Controllers\api;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();

    if($students->count() > 0){
        $data = [
            'status' => 200,
            'students' => $students
        ];
        return response()->json($data, 200);
    } else {
        return response()->json([
            'status' => 404,
            'students' => 'Empty table'
        ], 404);
    }
    }
}
