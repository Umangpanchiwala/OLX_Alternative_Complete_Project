<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [

           'user_id','product_id','country','state' ,'city' ,'pincode' ,'full_address'
    ];
}
