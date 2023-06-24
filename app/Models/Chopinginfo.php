<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chopinginfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'phonenumber',
        'user-id',


    ];
}
