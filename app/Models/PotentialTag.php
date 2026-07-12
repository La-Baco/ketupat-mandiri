<?php

namespace App\Models;

use App\Models\Potential;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotentialTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function potentials()
    {
        return $this->belongsToMany(
            Potential::class,
            'potential_tag'
        );
    }
}