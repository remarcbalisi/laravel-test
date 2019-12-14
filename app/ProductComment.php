<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class, 'id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'id');
    }
}
