<?php

namespace App\Models;

use Rinvex\Bookings\Models\BookableAvailability;

class Availability extends BookableAvailability
{
    protected $table = 'bookable_bookings';
}
