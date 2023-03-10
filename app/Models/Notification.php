<?php

namespace App\Models;

use App\Helpers\NotificationHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'api_token',
        'title',
        'body',
        'sent',
        'company_id',

        'user_id',
        'read_at'
    ];
 
}
