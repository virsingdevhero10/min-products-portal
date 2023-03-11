<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';


    public function category()
    {
      return $this->hasMany('App\Models\Category','id','category_id');
    }

    public function subCate()
    {
      return $this->hasMany('App\Models\SubCategory','id','sub_category_id');
    }

    public function product_images()
    {
      return $this->hasMany('App\Models\ProductImage','product_id','id');
    }

    

}
