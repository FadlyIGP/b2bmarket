<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockProduct extends Model
{
    use HasFactory;
    protected $table = 'product_stock';

    protected $fillable = [ 
        'id',
        'product_id',
        'qty'
    ];

}
