<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $primaryKey = 'product_id';
    protected $fillable = ['name', 'slug', 'description', 'price', 'quantity', 'status', 'category_id', 'created_by'];
}
