<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class estudiantes extends Model
{
    //use HasFactory;
    protected $table='estudiantes';
    public $timestamps=false;
    protected $fillable=[
        'id', 'nombre', 'email', 'direccion', 'edad', 'grado',
        //'id_jornada'
    ];

    protected $primaryKey='id';
}
