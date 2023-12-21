<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAssignments extends Model
{
    use HasFactory;

    protected $table = 'project_assignments';

    protected $fillable = [
        'project_id',
        'professor_id',
        // Otros campos si los tienes
    ];

    // Relación con el proyecto asignado
    public function project()
    {
        return $this->belongsTo(Projects::class, 'project_id');
    }

    // Relación con el profesor asignado
    public function professor()
    {
        return $this->belongsTo(Professors::class, 'professor_id');
    }
    
    public function grades()
    {
        return $this->hasMany(Grade::class, 'project_assignment_id');
    }
}
