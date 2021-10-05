<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['estado', 'tipo_reserva_id', 'user_id'];

    function user(){
        return $this->belongsTo(User::class);
    }

    function tipo_reserva(){
        return $this->belongsTo(TipoReserva::class);
    }

    function reserva_habitacion(){
        return $this->hasMany(ReservaHabitacione::class);
    }
}
