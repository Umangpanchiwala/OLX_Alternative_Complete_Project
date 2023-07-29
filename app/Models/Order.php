<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','product_id',
        'address_id' ,'order_date'
    ];



    public function address(){
        return $this->belongsTo(Address::class,'address_id','id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
