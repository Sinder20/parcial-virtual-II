<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table='genero';

    protected $primaryKey="id_genero";

    public $timestamps=false;

    protected $fillable =[
        'nombre'
    ];

    protected $guarded =[

    ];
}
