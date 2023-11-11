<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'unach_id',
        'title_project',
        'start_date',
        'end_date',
        'student_name',
    ];
}
