<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';

    protected $fillable = [
        'product_id',
        'user_id',
        'message',
        'answer',
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
