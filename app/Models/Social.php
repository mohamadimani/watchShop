<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'link',
        'icon',
        'is_active',
        'created_by',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getCreatedAtAttribute($value)
    {
        return lang() == 'fa' ? jDate($value, true) : $value;
    }
}
