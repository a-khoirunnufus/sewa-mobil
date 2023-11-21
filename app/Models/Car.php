<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'public.cars';

    protected $fillable = [
        'brand',
        'model',
        'plate_number',
        'rental_fee',
    ];
}
