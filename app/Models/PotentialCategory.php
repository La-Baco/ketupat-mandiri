<?php

namespace App\Models;

use App\Models\Potential;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotentialCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    public function potentials()
    {
        return $this->hasMany(Potential::class);
    }
}