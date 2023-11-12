<?php
// app/Http/Controllers/ProjectProtocol/UseCases/PutByIdProjectProtocolUseCase.php
// app/Http/Controllers/ProjectProtocol/UseCases/PutByIdProjectProtocolUseCase.php

namespace App\Http\Controllers\ProjectProtocol\UseCases;

use App\Models\ProjectProtocol;

class PutByIdProjectProtocolUseCase
{
    public function execute(string $id_projects, array $data)
    {
        $dataProject = ProjectProtocol::find($id_projects);

        if ($dataProject) {
            $dataProject->fill($data);
            $dataProject->save();

            return ['status' => 200, 'message' => 'Proyect Protocol modificado exitosamente', 'data' => $dataProject];
        } else {
            $message = "No se encontró el proyecto con el id_projects '{$id_projects}'";
            return ['status' => 404, 'error' => $message];
        }
    }
}
