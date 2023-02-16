<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    use HasFactory;
    protected $fillable =['city_id','name','image'];
    public function setImageAttribute($value)
    {
        $this->attributes['image'] = ImageHelper::saveImage($value, 'images');
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
    public function company()
    {
      return $this->hasMany(Company::class);
}
public function order()
{
  return $this->hasMany(Order::class);
}
}
