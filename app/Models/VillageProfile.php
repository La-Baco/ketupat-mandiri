<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VillageProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'history',
        'vision',
        'mission',
        'geography',
        'area',
        'population',
        'families',
        'hamlets',
        'rw',
        'rt',
        'postal_code',
        'latitude',
        'longitude',
        'village_map',
        'video_profile',
    ];
}