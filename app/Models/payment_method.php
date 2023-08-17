<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_method extends Model
{
    use HasFactory;
    protected $table = "payments_method";
    protected $fillable = [
        'name',
        'wallet', 
    ];

    public function balance()
    {
        return $this->hasMany(balance::class);
    }
}
