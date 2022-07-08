<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $incrementing = false;

    /**
     * Get sub_category for the category
     */
    public function sub_categories()
    {
        return $this->hasMany(Sub_category::class);
    }

    /**
     * the products that belong to the category
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
