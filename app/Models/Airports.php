<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airports extends Model
{
    use HasFactory;
    protected $table = 'airport';
    protected $fillable=[
        'airportCode',
        'airportName',
        'location',
    ];

    public $timestamps = false;
}
