<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_log_id',
        'page_title',
        'url',
        'route_name',
        'visited_at',
    ];

    protected function casts(): array
    {
        return [
            'visited_at' => 'datetime',
        ];
    }

    public function visitor()
    {
        return $this->belongsTo(VisitorLog::class, 'visitor_log_id');
    }
}