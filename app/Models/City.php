<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable =['name'];

    public function mall()
    {
      return $this->hasMany(Mall::class);
    }
    public static function  name(){
        return (new static)::where('name')->get();
    }
}
