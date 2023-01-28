<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    use HasFactory;
    protected $fillable =['city_id','name'];

    public function city(){
        return $this->belongsTo(City::class);
    }
    public function company()
    {
      return $this->hasMany(Company::class);
}
}
