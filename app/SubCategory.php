<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['category_id', 'subcategory_name', 'status'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
