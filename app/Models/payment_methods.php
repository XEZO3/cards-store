<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_methods extends Model
{
    use HasFactory;
    protected $table = "payment_methods";
    protected $fillable = [
        'name',
        'image',
        'ex_price',
        'wallet', 
    ];

    public function balance()
    {
        return $this->hasMany(balance::class);
    }
}
