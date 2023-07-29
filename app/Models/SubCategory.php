<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Product;
use App\Models\Adlisting;


class SubCategory extends Model
{
    use HasFactory;
    // protected $primaryKey = "main_category";
    public $table = "sub_categories";

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function Product()
    {
        return $this->hasMany(Product::class);
    }
    public function Adlisting()
    {
        return $this->hasMany(Adlisting::class);
    }
}
