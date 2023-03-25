<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderServices extends Model
{
    use HasFactory;
    protected $fillable =['order_id','service_id'];
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function orderservice()
    {
        return $this->hasMany(OrderServices::class);
    }
}
