<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'discount_price',
        'img',
        'quantity',
        'category_id',
        'description',
        'type_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function product_variants() {
        return $this->hasMany(ProductVariant::class);
    }

}
