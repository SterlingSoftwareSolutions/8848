<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name',
        'description',
        'icon_url',
        'background_image_url'
    ];

    protected $appends = [
        'Icon',
        'Background',
    ];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products(){
        $ids = $this->children->pluck('id');
        $ids[] = $this->id;
        $query = Product::query();
        $query->whereIn('category_id', $ids);
        return $query->get();
    }

    public function image($image)
    {
        $url = $this[$image];
        if(!$url){
            return '/images/product-dummy.jpeg';
        }
        if(str_starts_with($url, 'http')){
            return $url;
        } else{
            return '/' . str_replace('public', 'storage', $url);
        }
    }

    public function getIconAttribute(){
        return $this->image('icon_url');
    }

    public function getBackgroundAttribute(){
        return $this->image('background_image_url');
    }
}
