<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Potential extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'potential_category_id',
        'user_id',
        'title',
        'slug',
        'excerpt',
        'description',
        'thumbnail',
        'address',
        'contact_person',
        'phone',
        'email',
        'website',
        'google_maps_url',
        'views',
        'is_featured',
        'status',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'is_featured' => 'boolean',
        ];
    }

    public function category()
    {
        return $this->belongsTo(
            PotentialCategory::class,
            'potential_category_id'
        );
    }

    public function author()
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }

    public function tags()
    {
        return $this->belongsToMany(
            PotentialTag::class,
            'potential_tag'
        );
    }
}