<?php

namespace App\Models;

use App\Helpers\NotificationHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'title',
        'body',
        'sent',
        'company_id',
        'is_read',
        'user_id',
        'read_at'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function mall()
    {
        return $this->belongsTo(Mall::class);
    }
    public function orderservice()
    {
        return $this->belongsTo(OrderServices::class);
    }
}
