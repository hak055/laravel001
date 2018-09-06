<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = array('title');
	
    public function categories()
    {
		
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }
}
