<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'retail_price',
        'wholesale_price',
        'min_wholesale_qty',
        'quantity',
        'photo'
    ];
}