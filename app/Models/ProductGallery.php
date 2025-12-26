<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'title',
        'image',
        'position',
        'is_active',
        'created_by',
    ];
}
