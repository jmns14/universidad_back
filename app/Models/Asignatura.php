<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    public $table = 'asignaturas';
    protected $fillable = [
        'nombre',
        'descripcion',
        'creditos',
        'area_de_conocimiento',
        'obligatoria',
    ];

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'asignatura_estudiantes');
    }

    public function profesores()
    {
        return $this->belongsToMany(Profesor::class, 'asignatura_profesores');
    }
}
