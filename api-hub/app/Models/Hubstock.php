<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hubstock extends Model
{
    use HasFactory;

    protected $fillable = [
        'partnerId', 'quantity', 'cost', 'stockLocalId', 'price', 'sellPrice', 'available'
    ];
}
