<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaHabitacione extends Model
{
    use HasFactory;

    protected $table = 'reservas_habitaciones';
    
    protected $fillable = ['fecha_inicio', 'fecha_fin', 'habitacion_id', 'reserva_id'];

    function habitacion(){
        return $this->belongsTo(Habitacione::class);
    }

    function reserva(){
        return $this->belongsTo(Reserva::class);
    }
}
