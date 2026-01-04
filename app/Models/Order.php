<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
        'send_address',
        'is_active',
        'create_by',
        'deleted_by',
    ];
}
