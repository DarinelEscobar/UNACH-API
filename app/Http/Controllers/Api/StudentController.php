<?php
namespace App\Http\Controllers\api;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return $students->count() > 0
            ? response()->json(['status' => 200, 'students' => $students], 200)
            : response()->json(['status' => 404, 'students' => 'Empty table'], 404);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'password' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'errors' => $validator->messages()], 422);
        }

        $student = Student::create([
            'name' => $request->name,
            'password' => $request->password,
        ]);

        return $student
            ? response()->json(['status' => 200, 'message' => 'Created Successfully'], 200)
            : response()->json(['status' => 500, 'message' => 'Something went wrong'], 500);
    }
    public function show($id)
    {
        $students = Student::find($id);

        return $students
            ? response()->json(['status' => 200, 'students' => $students], 200)
            : response()->json(['status' => 404, 'students' => 'Id not found'], 404);
    }
    public function edit($id)
    {
        $students = Student::find($id);

        return $students
            ? response()->json(['status' => 200, 'students' => $students], 200)
            : response()->json(['status' => 404, 'students' => 'Id not found'], 404);
    }
    public function update(Request $request, int $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:100',
        'password' => 'required|string|max:100',
    ]);

    if ($validator->fails()) {
        return response()->json(['status' => 422, 'errors' => $validator->messages()], 422);
    }

    $student = Student::find($id);

    if (!$student) {
        return response()->json(['status' => 404, 'message' => 'Student not found'], 404);
    }

    $student->update([
        'name' => $request->name,
        'password' => $request->password,
    ]);

    return response()->json(['status' => 200, 'message' => 'Updated Successfully'], 200);
}
public function delete(int $id)
{
    $student = Student::find($id);

    if (!$student) {
        return response()->json(['status' => 404, 'message' => 'Student not found'], 404);
    }

    $student->delete();

    return response()->json(['status' => 200, 'message' => 'Deleted Successfully'], 200);
}


}
