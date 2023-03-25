<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use App\Traits\UserMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{
    use UserMethods, HasFactory;
    protected $fillable = [
        'mall_id', 'name', 'image', 'address',   'username',
        'phone',
        'email',
        'password',
        'suv_price',
        'sedan_price',
        'api_token',
        'firebase_token'
    ];
    protected $hidden = [
        'password',
        'remember_token',
        'api_token'
    ];


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
        return $this->belongsTo(Mall::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class, 'company_id', 'id');
    }
    public function order()
    {
      return $this->hasMany(Order::class);
    }
    public function copen()
    {
        return $this->hasMany(Copen::class,);
    }

}
