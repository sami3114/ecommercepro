<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'price',
        'stock',
        'image',
        'product_id',
        'user_id'
    ];

    public function getProduct(){
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function getUser(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
