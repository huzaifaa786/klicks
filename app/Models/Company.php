<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'mall_id', 'name', 'image', 'address',   'username',
        'phone',
        'email',
        'password',
    ];

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = ImageHelper::saveImage($value, 'images');
    }
    public function mall()
    {
        return $this->belongsTo(Mall::class);
    }
}
