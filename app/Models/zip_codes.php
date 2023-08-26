<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class zip_codes extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'code',
        'validity',
    ];
}
