<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockProduct extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'product_stock';

    protected $fillable = [ 
        'id',
        'product_id',
        'qty'
    ];

}
