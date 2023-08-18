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
        'payment_methods_id',
        'balance',
        'price',
        'state',
        'note',
        'name'
    ];


    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function payment_methods()
    {
        return $this->belongsTo(payment_methods::class);
    }
   
}
