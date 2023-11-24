<?php
// app/Http/Controllers/ProjectProtocol/UseCases/GetByIdUseCase.php

namespace App\Http\Controllers\ProjectProtocol\UseCases;

use App\Models\ProjectProtocol;

class GetByIdUseCase
{
    public function execute(string $id_projects=null)
    {
        if ($id_projects) {
            $ProjectProtocol = ProjectProtocol::where('id_projects', $id_projects)->get();
        } else {
            $ProjectProtocol = ProjectProtocol::all();
        }

        if ($ProjectProtocol->count() > 0) {
            return ['status' => 200, 'data' => ['ProjectProtocol' => $ProjectProtocol]];
        } else {
            $message = "No se encontraron proyectos con el estado '{$id_projects}'";
            return ['status' => 204, 'data' => ['error' => $message]];
        }
    }
}
