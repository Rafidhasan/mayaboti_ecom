<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'discount', 'user_id', 'total'
    ];

    protected $casts = [
        'quantity' => 'array',
        'price' => 'array',
    ];

    public function users() {
        return $this->belongsTo(User::class)->withTimeStamps();
    }
}
