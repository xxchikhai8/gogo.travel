<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticketID',
        'flightID',
        'username',
        'tickerPrice',
        'tickerNumber',
        'seetClass',
        'passenger',
        'tiketType',
        'state',
    ];

    public $timestamps = false;
}
