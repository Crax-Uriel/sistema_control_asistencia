<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Practicante extends Model
{

    protected $fillable = [
        'nombre_practicante',
        'apellido_paterno_practicante',
        'apellido_materno_practicante',
        'curp_practicante',
        'direccion_practicante',
        'telefono_practicante',
        'genero_practicante',
        'fecha_nacimiento_practicante',
        'email',
        'password',
        'codigo_gafete',
        'fecha_ingreso_practicante',
        'areas_id',
        'status_practicante',
        'fotografia_practicante',
        'area_id', 
        'user_id', 
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
