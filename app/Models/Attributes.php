<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    protected $primaryKey = 'attribute_id';
    protected $fillable = ['name', 'code', 'type', 'created_by'];
}
