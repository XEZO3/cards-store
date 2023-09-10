<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'card_id',
        'order_id',
        'quentity',
        'username',
        'password',
        'game_id',
        'keys',
        'rejecte_cause',
        'state',
        'total', 
    ];

    protected static function booted()
    {
        static::creating(function ($order) {
            $uniqueOrderId = null;
            do {
                $uniqueOrderId = rand(); 
            } while (static::where('order_id', $uniqueOrderId)->exists()); 

            $order->order_id = $uniqueOrderId;
        });
    }
    public function card()
    {
        return $this->belongsTo(card::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
