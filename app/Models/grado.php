<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grado extends Model
{
    use HasFactory;
    protected $table='grado';
    public $timestamps=false;
    protected $fillable=[
        'id', 'descripcion'
    ];

    protected $primaryKey='id';
}
