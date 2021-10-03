<?php

namespace App\Models;

use Rinvex\Bookings\Models\BookableBooking;

class Booking extends BookableBooking
{
    protected $table = 'bookable_bookings';
}
