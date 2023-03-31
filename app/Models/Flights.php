<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flights extends Model
{
    use HasFactory;
    protected $table = 'flights';
    protected $fillable = [
        'planeID',
        'flightID',
        'departure',
        'destination',
        'departDay',
        'boardingTime',
        'flightTime',
        'returnDay',
        'priceTicket',
        'state',
    ];

    public $timestamps = false;
}
