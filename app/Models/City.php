<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image'];

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = ImageHelper::saveImage($value, 'images');
    }
    public function getImageAttribute($value)
    {
        if ($value)
            return asset($value);
        else
            return $value;
    }

    public function mall()
    {
        return $this->hasMany(Mall::class);
    }
    public static function  name()
    {
        return (new static)::where('name')->get();
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
