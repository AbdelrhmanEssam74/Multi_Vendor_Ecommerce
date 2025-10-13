<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Attributes extends Model
{
    protected $primaryKey = 'attribute_id';
    protected $fillable = ['name', 'code', 'type', 'status', 'created_by'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_attribute_values', 'attribute_id', 'product_id');
    }

    public function hasProduct(): bool
    {
        return DB::table('product_attribute_values')
            ->where('attribute_id', $this->attribute_id)
            ->exists();
    }
}
