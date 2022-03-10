<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jornada extends Model
{
    //use HasFactory;
    protected $table='jornada';
    public $timestamps=false;
    protected $fillable=[
        'id_jornada', 'descripcion'
    ];

    protected $primaryKey='idjornada';
}
