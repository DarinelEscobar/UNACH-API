<?php
// app/Http/Controllers/Projects/UseCases/GetByStatusUseCase.php

namespace App\Http\Controllers\Projects\UseCases;

use App\Models\Projects;

class GetByStatusUseCase
{
    public function execute(string $status = null)
    {
        if ($status) {
            $projects = Projects::where('status', $status)->orderBy('updated_at', 'desc')->get();
        }

        if ($projects->count() > 0) {
            return ['status' => 200, 'data' => ['projects' => $projects]];
        } else {
            $message = "No se encontraron proyectos con el estado '{$status}'";
            return ['status' => 200, 'data' => ['error' => $message]];
        }
    }
}
