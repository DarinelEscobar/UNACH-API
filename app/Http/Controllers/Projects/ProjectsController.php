<?php
// app/Http/Controllers/Projects/ProjectsController.php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Projects\UseCases\CreateProjectUseCase;
use App\Http\Controllers\Projects\UseCases\GetByStatusUseCase;  
use App\Http\Controllers\Projects\UseCases\GetByunach_idUseCase; 
use App\Http\Controllers\Projects\UseCases\PutStatusByIDUseCase; 
use App\Http\Controllers\Projects\UseCases\PutDataByIDUseCase; 
 

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function create(Request $request)
    {
        $useCase = new CreateProjectUseCase(); 
        $result = $useCase->execute($request->all());

        return response()->json($result, $result['status']);
    }

    public function getByStatus(Request $request)
    {
        $status = $request->input('status');
        $useCase = new GetByStatusUseCase();
        $result = $useCase->execute($status);

        return response()->json($result['data'] ?? [], $result['status']);
    }
    public function getByunach_id($unach_id)
    {
        $useCase = new GetByunach_idUseCase();
        $result = $useCase->execute($unach_id);

        return response()->json($result['data'] ?? [], $result['status']);
    }
    public function modifyStatusByID(Request $request)
    {
        $status = $request->input('status');
        $id = $request->input('id');

        $useCase = new PutStatusByIDUseCase();
        $result = $useCase->execute($id, $status);

        return response()->json($result, $result['status']);
    }
    public function modifyDataByID(Request $request, $id)
{
    // Get the data from the request body
    $requestData = $request->json()->all();

    $useCase = new PutDataByIDUseCase();
    $result = $useCase->execute($id, $requestData);

    return response()->json($result, $result['status']);
}


}
