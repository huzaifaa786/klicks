<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
         'service_name', 'image', 'price',


    ];



    public function setImageAttribute($value)
    {
        $this->attributes['image'] = ImageHelper::saveImageFromApi($value, 'images');
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
