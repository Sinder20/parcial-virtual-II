<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';

    protected $primaryKey="id_cliente";

    public $timestamps=false;

    protected $fillable =[
        'nit',
        'nombre',
        'fecha_nacimiento',
        'edad',
        'correo',
        'telefono',
        'id_categoria',
        'id_genero',
        'id_departamento'
    ];

    protected $guarded =[

    ];
}
