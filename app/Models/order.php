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
        'quentity',
        'game_id',
        'keys',
        'state',
        'total', 
    ];

    public function card()
    {
        return $this->belongsTo(card::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
