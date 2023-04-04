<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['custumer', 'city_id', 'mall_id', 'company_id', 'user_id', 'parking', 'floor', 'number_plate', 'cartype', 'payment_intent', 'totalpayment', 'status','paymentmethod'];

    protected $with = ['mall','company'];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function mall()
    {
        return $this->belongsTo(Mall::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function orderservice()
    {
        return $this->hasMany(OrderServices::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function service()
    {
        return $this->hasMany(OrderServices::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
}
