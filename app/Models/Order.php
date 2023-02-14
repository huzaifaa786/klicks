<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =['city_id','mall_id','company_id','parking','floor','number_plate','cartype','tip','totalpayment'];
}
