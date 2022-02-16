<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudiantes extends Model
{
    protected $table='estudiantes';
    public $timestamps=false;
    protected $fillable=[
        'id', 'nombre', 'email', 'direccion', 'edad'
    ];

    protected $primaryKey='id';
}
