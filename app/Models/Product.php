<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = [
        'gallery' => 'array',
    ];

    protected $primaryKey = 'product_id';
    //product_id	seller_id	category_id	store_id	name	slug	description	price	stock	main_image	gallery	status
    protected $fillable = ['product_id', 'seller_id' , 'category_id' , 'store_id' , 'name' , 'slug' , 'description' , 'price' , 'stock' , 'main_image' , 'gallery' , 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function attributes()
    {
        return $this->belongsToMany(Attributes::class, 'product_attribute_values', 'product_id', 'attribute_id');
    }
}
