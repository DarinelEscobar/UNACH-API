<?php

namespace App\Http\Controllers\ProjectProtocol;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ProjectProtocol\UseCases\GetByIdUseCase;
use App\Http\Controllers\ProjectProtocol\UseCases\PostProjectProtocolUseCase;
use App\Http\Controllers\ProjectProtocol\UseCases\PutByIdProjectProtocolUseCase;

class ProjectProtocolController extends Controller
{
    public function getById($id_projects)
    {
        $useCase = new GetByIdUseCase();
        $result = $useCase->execute($id_projects);

        return response()->json($result['data'] ?? [], $result['status']);
    }

    public function post(Request $request)
    {
        $useCase = new PostProjectProtocolUseCase();
        $result = $useCase->execute($request->all());

        return response()->json($result, $result['status']);
    }

    public function putById(Request $request, $id_projects)
    {
        $useCase = new PutByIdProjectProtocolUseCase();
        $result = $useCase->execute($id_projects, $request->all());

        return response()->json($result, $result['status']);
    }
}
