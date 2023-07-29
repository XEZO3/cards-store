<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total', 
    ];

    public function order_item()
    {
        return $this->hasMany(order_item::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
