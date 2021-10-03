<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Rinvex\Bookings\Traits\Bookable;
use Illuminate\Database\Eloquent\Model;

class Habitacione extends Model
{
    use HasFactory, Bookable;
    
    protected $fillable = ['letra_numero', 'estado', 'tipo_habitacion_id'];

    public static function getBookingModel(): string
    {
        return Booking::class;
    }

    public static function getRateModel(): string
    {
        return Rate::class;
    }

    public static function getAvailabilityModel(): string
    {
        return Availability::class;
    }

    function tipo_habitacion(){
        return $this->belongsTo(TipoHabitacione::class, 'tipo_habitacion_id', 'id');
    }

    function reserva_habitacion(){
        return $this->hasMany(ReservaHabitacione::class);
    }
}
