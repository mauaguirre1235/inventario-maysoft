<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_resguardo',
        'id_equipo',
        'tipo_equipo',
        'modelo_cpu',
        'no_serie_cpu',
        'modelo_monitor',
        'no_serie_monitor',
        'modelo_teclado',
        'no_serie_cargador',
        'no_serie_teclado',
        'modelo_mause',
        'no_serie_mause',
        'modelo_nobreak',
        'no_serie_nobreak',
        'usuario',
        'no_empleado',
        'puesto',
        'area_asignada',
        'unidad_administrativa',
        'no_contacto',
        'correo_electronico'
    ];
}