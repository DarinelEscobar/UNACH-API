<?php
//UNACH-API\app\Http\Controllers\Grades\GradesController.php
namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Grades\UseCases\PostGradeUseCase;  
use App\Http\Controllers\Grades\UseCases\PutGradeUseCase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    private $postGradeUseCase;

    public function __construct(PostGradeUseCase $postGradeUseCase, PutGradeUseCase $putGradeUseCase)
    {
        $this->postGradeUseCase = $postGradeUseCase;
        $this->putGradeUseCase = $putGradeUseCase;
    }

    public function post(Request $request)
    {
        $result = $this->postGradeUseCase->execute($request->all());

        return response()->json($result, $result['status']);
    }
    public function put(Request $request, $id) 
    {
        $result = $this->putGradeUseCase->execute($id, $request->all());  

        return response()->json($result, $result['status']);
    }
}
