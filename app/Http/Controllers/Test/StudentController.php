<?php
namespace App\Http\Controllers\Test;

use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Test\UseCases\GetAllStudentsUseCase;
use App\Http\Controllers\Test\UseCases\CreateStudentUseCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $useCase = new GetAllStudentsUseCase();
        $result = $useCase->execute();

        return response()->json($result['data'] ?? [], $result['status']);
    
    }

    public function store(Request $request)
    {
        $useCase = new CreateStudentUseCase();
        $result = $useCase->execute($request->all());

        return response()->json($result, $result['status']);
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
