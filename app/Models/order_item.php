<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'card_id',
        'quentity',
        'current_item_price', 
    ];

    public function order()
    {
        return $this->belongsTo(order::class);
    }
    public function card()
    {
        return $this->belongsTo(card::class);
    }
}
