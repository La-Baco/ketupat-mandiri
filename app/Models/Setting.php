<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'setting_group_id',
        'key',
        'value',
        'type',
        'label',
        'description',
    ];

    public function group()
    {
        return $this->belongsTo(SettingGroup::class, 'setting_group_id');
    }
}