<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'price',
        'discount',
        'category_id',
        'require_id',
        'avilability',
    ];
    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function order()
    {
        return $this->hasMany(order::class);
    }

    public function card_keys()
    {
        return $this->hasMany(card_keys::class);
    }
}
