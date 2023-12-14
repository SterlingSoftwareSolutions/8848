<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'variant_id',
    ];

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}
