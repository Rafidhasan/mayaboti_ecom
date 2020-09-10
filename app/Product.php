<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'image', 'quantity', 'user_id'
    ];

    protected $casts = ['image' => 'array'];
}
