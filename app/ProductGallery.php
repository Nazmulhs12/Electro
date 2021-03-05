<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    public function Products () {
        return $this->belongsTo(Product::class, 'product_id');

    }
}
