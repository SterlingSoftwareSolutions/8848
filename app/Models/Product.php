<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'short_description',
        'category_id',
        'sku',
        'in_stock',
        'image_1_url',
        'image_2_url',
        'image_3_url',
        'image_4_url'
    ];

    protected $hidden = [
        'image_1_url',
        'image_2_url',
        'image_3_url',
        'image_4_url'
    ];

    protected $appends = [
        'image_1',
        'image_2',
        'image_3',
        'image_4'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function price()
    {
        $prices = $this->variants->pluck('price')->toArray();
        if (count($prices) <= 1) {
            return $prices[0] ?? 0;
        } else {
            return min($prices) . ' - ' . max($prices);
        }
    }

    public function image($index)
    {
        $url = $this['image_' . $index . '_url'];
        if (!$url) {
            return '/images/product-dummy.jpeg';
        }
        if (str_starts_with($url, 'http')) {
            return $url;
        } else {
            return '/' . str_replace('public', 'storage', $url);
        }
    }

    public function getImage1Attribute()
    {
        return $this->image(1);
    }

    public function getImage2Attribute()
    {
        return $this->image(2);
    }

    public function getImage3Attribute()
    {
        return $this->image(3);
    }

    public function getImage4Attribute()
    {
        return $this->image(4);
    }


    public function getAvailableOnFavouriteAttribute()
    {

        if ($user = auth()->user()) {
            return $user->my_list()->where('product_id', $this->id)->exists();
        }
    }
}
