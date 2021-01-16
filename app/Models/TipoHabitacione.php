<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHabitacione extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'precio', 'descripcion'];

    function habitacione(){
        return $this->hasMany(Habitacione::class, 'tipo_habitacion_id');
    }
}
