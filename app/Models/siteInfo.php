<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siteInfo extends Model
{
    use HasFactory;
    protected $table="site_info";
    protected $fillable = [
        'name',
        'logo',
        'email',
        'phone_number',
        'service',
        'terms'
    
    ];
}
