<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Rinvex\Bookings\Traits\HasBookings;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasBookings;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getBookingModel(): string
    {
        return Booking::class;
    }
    
    function reserva(){
        return $this->hasMany(Reserva::class);
    }

    function tipo_usuario(){
        return $this->belongsTo(TipoUser::class);
    }
}
