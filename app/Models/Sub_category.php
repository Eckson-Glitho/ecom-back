<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    use HasFactory;

    public $incrementing = false;

    /**
     * get the category that owns the sub_category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * the products that belong to the sub category
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
