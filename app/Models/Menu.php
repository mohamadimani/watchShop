<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'link',
        'icon',
        'is_active',
        'created_by',
        'updated_by'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    
    public function getCreatedAtAttribute($value)
    {
        return lang() == 'fa' ? jDate($value, true) : $value;
    }
}
