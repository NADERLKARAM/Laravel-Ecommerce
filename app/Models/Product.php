<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'quantity', 'category_id', 'image'];

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'carts')->withPivot('quantity');
    }

    public function images()
{


    return $this->hasMany(ProductImage::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}

}