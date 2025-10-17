<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /*
     *  store id
     *  store name
     *  store slug
     *  store description
     *  store logo
     *  store banner
     *  store email
     *  store phone
     *  store address
     *  store category
     *  store status
     */
    protected $primaryKey = 'store_id';
    protected $fillable = [
        'seller_id',
        'name',
        'slug',
        'description',
        'logo',
        'banner',
        'email',
        'phone',
        'address',
        'category_id',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'store_id');
    }
}
