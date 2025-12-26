<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'price',
        'image',
        'brand_id',
        'guaranty',
        'count',
        'review',
        'is_economy',
        'is_special',
        'special_expired_at',
        'category_id',
        'is_active',
        'active_by',
        'deleted_by',
        'created_by',
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = implode('-', explode(' ', $value));
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product');
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault(['title' => '---']);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }

}
