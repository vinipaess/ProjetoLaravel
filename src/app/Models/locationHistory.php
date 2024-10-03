<?php

namespace App\Models;

use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locationHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'age',
        'latitude',
        'longitude'
    ];
}
