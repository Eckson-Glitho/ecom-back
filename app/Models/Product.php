<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * the wishlists that belong to the product
     */
    public function wishlists()
    {
        return $this->belongsToMany(Wishlist::class);
    }

    /**
     * the categories that belong to the product
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * the sub categories that belong to the product
     */
    public function sub_categories()
    {
        return $this->belongsToMany(Sub_category::class);
    }
}
