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

    public function order_item()
    {
        return $this->hasMany(order_item::class);
    }
}
