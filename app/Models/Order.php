<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'user_id',
        'order_type',
        'status',
        'payment_status',
        'discount',
        'order_date',

        'billing_first_name',
        'billing_last_name',
        'billing_company',
        'billing_address_line_1',
        'billing_address_line_2',
        'billing_city',
        'billing_zip',
        'billing_country',
        'billing_state',
        'billing_phone',

        'shipping_first_name',
        'shipping_last_name',
        'shipping_company',
        'shipping_address_line_1',
        'shipping_address_line_2',
        'shipping_city',
        'shipping_zip',
        'shipping_country',
        'shipping_state',
        'shipping_phone'
    ];

    public function items(){
        return $this->hasMany(OrderItems::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
