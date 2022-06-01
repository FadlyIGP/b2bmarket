<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';

    protected $fillable = [ 
        'id',
        'product_id',
        'product_qty',
        'product_price',
        'total_price',
        'status',
        'user_id',
        'company_id'
    ];

    public function image() 
    {
        return $this->hasMany(ImgProduct::class, 'product_id','product_id');
    }
}
