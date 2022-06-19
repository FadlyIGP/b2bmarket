<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;
    protected $table = 'transaction_item';

    protected $fillable = [ 
        'id',
        'transaction_id',
        'product_name',
        'product_descriptions',
        'product_size',
        'product_price',
        'product_item',
        'product_qty',
        'price_total',
        'product_id'
    ];    
}
