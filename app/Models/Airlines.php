<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airlines extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'airlineName',
        'airlineCode',
        'enterpriseNum',
        'Nation',
    ];

    public $timestamps = false;
}
