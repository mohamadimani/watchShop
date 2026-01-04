<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'order_id',
        'product_id',
        'color_id',
        'price',
        'count',
        'total_amount',
        'is_active',
        'created_by',
        'deleted_by',
    ];
}
