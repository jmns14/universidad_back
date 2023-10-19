<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    public $table = 'estudiantes';
    protected $fillable = [
        'documento',
        'nombres',
        'telefono',
        'email',
        'direccion',
        'ciudad',
        'semestre',
    ];

    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class, 'asignatura_estudiantes');
    }
}
