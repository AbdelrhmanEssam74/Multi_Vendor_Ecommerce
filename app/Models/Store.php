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
     *  store categories
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
        'categories',
        'status',
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_store', 'store_id', 'category_id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }
    public function products()
    {
        return $this->hasMany(product::class, 'store_id');
    }
}
