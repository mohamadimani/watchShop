<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'mobile',
        'message',
        'is_read',
        'read_by',
    ];

    public function getCreatedAtAttribute($value)
    {
        return lang() == 'fa' ? jDate($value, true) : $value;
    }

    public function getIsReadAttribute($value)
    {
        return $value == true ? '<span class="badge bg-label-success">بله</span>' : '<span class="badge bg-label-danger">خیر</span>';
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function readBy()
    {
        return $this->belongsTo(User::class, 'read_by')->first();
    }
}
