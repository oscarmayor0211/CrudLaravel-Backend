<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['id','cedula', 'nombres','apellidos','correo','telefono'];
    protected $primaryKey = 'id';
}
