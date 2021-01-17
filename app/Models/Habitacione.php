<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacione extends Model
{
    use HasFactory;
    
    protected $fillable = ['letra_numero', 'estado', 'tipo_habitacion_id'];

    function tipo_habitacion(){
        return $this->belongsTo(TipoHabitacione::class, 'tipo_habitacion_id', 'id');
    }

    function reserva_habitacion(){
        return $this->hasMany(ReservaHabitacione::class);
    }
}
