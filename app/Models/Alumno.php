<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /** @use HasFactory<\Database\Factories\AlumnoFactory> */
    use HasFactory;

    protected $table = 'alumnos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Agregamos el campo 'cancion_favorita' para que pueda ser llenado
    protected $fillable = ["nombre", "email", "edad", "cancion_favorita"];

    public function idiomas()
    {
        return $this->hasMany(Idioma::class);
    }
}
