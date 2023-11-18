<?php
// app/Http/Controllers/DataProjects/UseCases/PutByIdDataProjectUseCase.php
// app/Http/Controllers/DataProjects/UseCases/PutByIdDataProjectUseCase.php

namespace App\Http\Controllers\DataProjects\UseCases;

use App\Models\DataProjects;

class PutByIdDataProjectUseCase
{
    public function execute(string $id_projects, array $data)
    {
        $dataProject = DataProjects::find($id_projects);

        if ($dataProject) {
            $dataProject->fill($data);
            $dataProject->save();

            return ['status' => 200, 'message' => 'Proyecto de datos modificado exitosamente', 'data' => $dataProject];
        } else {
            $message = "No se encontró el proyecto con el id_projects '{$id_projects}'";
            return ['status' => 400, 'error' => $message, 'data' => $dataProject];
        }
    }
}
