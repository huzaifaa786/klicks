<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slid extends Model
{
    use HasFactory;
    protected $fillable = ['image1', 'image2', 'image3'];
    public function setImage1Attribute($value)
    {
        $this->attributes['image1'] = ImageHelper::saveImage($value, 'images');
    }
    public function setImage2Attribute($value)
    {
        $this->attributes['image2'] = ImageHelper::saveImage($value, 'images');
    }
    public function setImage3Attribute($value)
    {
        $this->attributes['image3'] = ImageHelper::saveImage($value, 'images');
    }
    public function getImageAttribute($value)
    {
        if ($value)
            return asset($value);
        else
            return $value;
    }
}
