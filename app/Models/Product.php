<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\SubCategory;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    public function cate(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function subcate(){
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }
}
