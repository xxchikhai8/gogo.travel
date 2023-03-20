<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'cusName',
        'gender',
        'phone',
        'email',
        'DoB',
    ];

    public $timestamps = false;
}
