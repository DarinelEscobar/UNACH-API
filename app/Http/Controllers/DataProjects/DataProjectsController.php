<?php
// app/Http/Controllers/DataProjects/DataProjectsController.php

namespace App\Http\Controllers\DataProjects;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataProjects\UseCases\GetByIdUseCase;
use App\Http\Controllers\DataProjects\UseCases\PostDataProjectUseCase;  
use App\Http\Controllers\DataProjects\UseCases\PutByIdDataProjectUseCase; 
use Illuminate\Http\Request;

class DataProjectsController extends Controller
{
    public function getById(Request $request, $id_projects)
    {
        $useCase = new GetByIdUseCase();
        $result = $useCase->execute($id_projects);

        return response()->json($result['data'] ?? [], $result['status']);
    }

    public function post(Request $request)
    {
        $useCase = new PostDataProjectUseCase();
        $result = $useCase->execute($request->all());

        return response()->json($result, $result['status']);
    }

    public function putById(Request $request, $id_projects)
    {
        $useCase = new PutByIdDataProjectUseCase();
        $result = $useCase->execute($id_projects, $request->all());

        return response()->json($result, $result['status']);
    }
}
