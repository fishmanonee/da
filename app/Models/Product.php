<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'description',
        'price',
        'discount_price',
        'category_id',
        'type_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }
}
