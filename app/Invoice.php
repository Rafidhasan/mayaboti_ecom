<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'image', 'quantity', 'user_id'
    ];

    protected $casts = ['image' => 'array'];
}
