<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';
    protected $fillable=[
        'title',
        'description',
        'stock',
        'price',
        'discount_price',
        'category_id',
        'image',
        'is_active',
    ];

    public function getCategory()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
