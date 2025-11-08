<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_attribute_value extends Model
{
    protected $primaryKey = 'pav_id'; // -> product_attribute_values
    protected $fillable = ['product_id' , 'attribute_id' , 'value'];
}
