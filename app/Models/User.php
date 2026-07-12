<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_login_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function potentials()
    {
        return $this->hasMany(Potential::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }
}