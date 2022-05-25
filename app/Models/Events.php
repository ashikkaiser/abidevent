<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'date',
        'price_type',
        'price',
        'description',
        'location',
        'state'
    ];
}
