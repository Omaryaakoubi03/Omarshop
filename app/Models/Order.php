<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'shpping_number',
        'user-id',
        'shpping_city',
        'shpping_codepostal',
        'product_name',
        'qunatiti',



    ];
}
