<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hubsku extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku', 'title', 'partnerId', 'ean', 'amount', 'price', 'sellPrice', 'available'
    ];
}
