<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'base_price',
        'category_id',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function orderItems()
{
    return $this->hasManyThrough(
        OrderItem::class,
        ProductVariant::class,
        'product_id',          
        'product_variant_id',  
        'id',                  
        'id'                   
    );
}

    protected static function booted()
    {
        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }


    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function galleryImages()
    {
        return $this->hasMany(GalleryImage::class);
    }
}
