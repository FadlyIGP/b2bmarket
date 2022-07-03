<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHistory extends Model
{
    use HasFactory;

    protected $table = 'product_history';

    protected $fillable = [ 
        'id',
        'user_id',
        'product_id',
        'counting',
    ];
}
