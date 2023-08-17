<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class balance extends Model
{
    use HasFactory;
    protected $table="balance";
    protected $fillable = [
        'user_id',
        'payment_method_id',
        'payment_method',
        'balance',
        'price',
        'is_valid'
    ];


    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function payment_method()
    {
        return $this->belongsTo(payment_method::class);
    }
}
