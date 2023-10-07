<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'price',
        'sku',
        'in_stock',
        'image_1_url',
        'image_2_url',
        'image_3_url',
        'image_4_url'
    ];
}
