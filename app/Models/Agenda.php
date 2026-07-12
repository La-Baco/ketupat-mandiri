<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agenda extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'description',
        'thumbnail',
        'location',
        'event_date',
        'start_time',
        'end_time',
        'contact_person',
        'contact_phone',
        'views',
        'is_featured',
        'status',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
            'published_at' => 'datetime',
            'is_featured' => 'boolean',
        ];
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}