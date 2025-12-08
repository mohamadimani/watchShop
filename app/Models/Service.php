<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'created_by',
        'is_active',
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
