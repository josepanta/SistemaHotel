<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaHabitacione extends Model
{
    use HasFactory;

    protected $table = 'reservas_habitaciones';

    function habitacion(){
        return $this->belongsTo(Habitacione::class);
    }

    function reserva(){
        return $this->belongsTo(Reserva::class);
    }
}
