<?php

namespace App\Models;

use App\Models\PageView;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'ip_address',
        'user_agent',
        'browser',
        'platform',
        'device_type',
        'referer',
        'landing_page',
        'first_visit_at',
        'last_activity_at',
    ];

    protected function casts(): array
    {
        return [
            'first_visit_at' => 'datetime',
            'last_activity_at' => 'datetime',
        ];
    }

    public function pageViews()
    {
        return $this->hasMany(PageView::class);
    }
}