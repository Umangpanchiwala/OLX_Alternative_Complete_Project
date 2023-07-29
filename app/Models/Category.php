<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Adlisting;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';
    public $timestamp = false;


    public function Subcategory()
    {
        return $this->hasMany(SubCategory::class, 'sub_category_id','id');
    }
    public function Product()
    {
        return $this->hasMany(Product::class);
    }
    protected $guarded = [];

    public function subcategories(){

        return $this->hasMany('App\Category', 'parent_id');
    }
    public function Adlisting()
    {
        return $this->hasMany(Adlisting::class);
    }
}
