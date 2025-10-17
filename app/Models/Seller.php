<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    /*
     * seller id
     *  seller name
     *  seller slug
     *  seller email
     *  seller phone
     *  seller address
     *  seller image
     *  seller status
     *  seller created_at
     *  seller updated_at
     */
    protected $primaryKey = 'seller_id';
    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'address',
        'image',
        'status',
    ];
    public function stores()
    {
        return $this->hasMany(Store::class, 'seller_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
