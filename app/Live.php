<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    protected $fillable = ['name'];

    public function products() {
        return $this->belongsTo(Product::class)->withTimeStamps();
    }
}
