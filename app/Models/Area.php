<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'nombre_area',
        'descripcion_area',
        'status',
        
    ];

    public function practicantes()
    {
        return $this->hasMany(Practicante::class, 'area_id');
    }
}
