<?php
// app/Http/Controllers/DataProjects/UseCases/GetByIdUseCase.php

namespace App\Http\Controllers\DataProjects\UseCases;

use App\Models\DataProjects;

class GetByIdUseCase
{
    public function execute(string $id_projects=null)
    {
        if ($id_projects) {
            $DataProjects = DataProjects::where('id_projects', $id_projects)->get();
        } else {
            $DataProjects = DataProjects::all();
        }

        if ($DataProjects->count() > 0) {
            return ['status' => 200, 'data' => ['DataProjects' => $DataProjects]];
        } else {
            $message = "No se encontraron datos de proyecto '{$id_projects}'";
            return ['status' => 200, 'data' => ['error' => $message]];
        }
    }
}
