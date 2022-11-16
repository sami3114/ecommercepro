<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable=[
        'name',
        'price',
        'stock',
        'image',
        'payment_status',
        'delivery_status',
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
