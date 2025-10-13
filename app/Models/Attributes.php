<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    protected $primaryKey = 'attribute_id';
    protected $fillable = ['name', 'code', 'type', 'status', 'created_by'];

    public function products(){
        return $this->belongsToMany(Product::class, 'product_attribute_values', 'attribute_id', 'product_id');
    }
}
