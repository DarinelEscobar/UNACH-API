<?php

namespace App\Http\Controllers\ProjectAssignments;

use App\Http\Controllers\Controller;

use App\Http\Controllers\ProjectAssignments\UseCases\CreateUseCase;
use App\Http\Controllers\ProjectAssignments\UseCases\GetByIdProjectUseCase;
use App\Http\Controllers\ProjectAssignments\UseCases\GetByIdProfesorUseCase;

use Illuminate\Http\Request;

class ProjectAssignmentsController extends Controller
{
    public function getByIdProject($project_id)
    {
        $useCase = new GetByIdProjectUseCase();
        $result = $useCase->execute($project_id);

        return response()->json($result, $result['status']);
    }

    public function getByIdProfesor($professor_id)
    {
        $useCase = new GetByIdProfesorUseCase();
        $result = $useCase->execute($professor_id);

        return response()->json($result, $result['status']);
    }

    public function create(Request $request)
    {
        $useCase = new CreateUseCase(); 
        $result = $useCase->execute($request->json()->all());

        return response()->json($result, $result['status']);
    }
}
