<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'building',
        'room_number',
        'number_of_beds',
        'ac',
        'balcony',
        'fridge'
    ];
}
