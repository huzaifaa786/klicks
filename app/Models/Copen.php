<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copen extends Model
{
    use HasFactory;
    protected $fillable = ['company_id', 'copen','percentage','minimum','maximum'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

