<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variant_id',
        'product_attribute_value_id',
    ];

    public function variants()
    {
        return $this->belongsToMany(
            ProductVariant::class,
            'product_variant_values'
        );
    }

    public function value()
    {
        return $this->belongsTo(ProductAttributeValue::class);
    }
}
