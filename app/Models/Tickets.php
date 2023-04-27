<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $fillable = [
        'ticketID',
        'flightID',
        'username',
        'passengerName',
        'citizenID',
        'luggage',
        'gate',
        'tickerPrice',
        'seetClass',
        'seet',
        'tiketType',
        'bookingDay',
        'state',
    ];

    public $timestamps = false;
}
