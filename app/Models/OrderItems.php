<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'variant_id',
        'quantity',
        'full_price',
        'price'
    ];

    protected $appends = [
        'image',
        'title',
        'variant_name'
    ];

    public function variant()
    {
        return $this->belongsTo(Variant::class)->with('product');
    }

    public function getImageAttribute()
    {
        return $this->variant->product->image_1;
    }

    public function getTitleAttribute()
    {
        return $this->variant->product->title;
    }

    public function getVariantNameAttribute()
    {
        return $this->variant->name;
    }
}
