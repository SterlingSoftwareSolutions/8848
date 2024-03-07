<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'variant_id',
        'quantity'
    ];

    public function variant()
    {
        return $this->belongsTo(Variant::class)->with('product');
    }
}
