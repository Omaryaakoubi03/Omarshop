<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_category_name',
        'product_subcategory_name',
        'product_category_id',
        'product_name',
        'product_subcategory_id',
        'slug',
        'product_short_description',
        'product_long_description',
        'price',
        'product_img',


    ];
}
