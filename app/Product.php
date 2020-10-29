<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['cat_id', 'subcat_id', 'brand_id', 'name', 'slug', 'model', 'buying_price', 'selling_price', 'special_price', 'special_start', 'special_end', 'quantity', 'video_url', 'warranty', 'warranty_duration', 'warranty_conditions', 'thumbnail', 'gallery', 'description', 'long_description', 'status'];

    public const ACTIVE_PRODUCT = 'active';
    public const INACTIVE_PRODUCT = 'active';
}
