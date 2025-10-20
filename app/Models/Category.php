<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_name','category_slug','status','category_image','parent_id'];

    public function parent()
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(__CLASS__, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
    public function attributes()
    {
        return $this->hasMany(Attributes::class, 'category_id');
    }
    //  get all children's IDs
    public function getAllChildrenIds(): int|array
    {
        $ids = [];
        foreach ($this->children as $child) {
            $ids[] = $child->id;
            $ids = array_push($ids, ...$child->getAllChildrenIds());
        }
        return $ids;
    }
    public function hasChildren(){
        return $this->children()->exists();
    }
    public function getCategoryImageUrlAttribute()
    {
        return $this->category_image
            ? asset('storage/' . $this->category_image)
            : null;
    }

}
