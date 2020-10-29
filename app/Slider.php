<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['title', 'sub_titile', 'image', 'url', 'start', 'end', 'status'];
}