<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstProduct extends Model
{
    use HasFactory;
    protected $table = 'mst_product';

    protected $casts = [
      'wishlist_status' => 'boolean',
    ];

    protected $fillable = [ 
        'id',
        'product_name',
        'product_descriptions',
        'product_size',
        'product_price',
        'product_item',
        'wishlist_status',
        'company_id'
    ];

    public function stock() 
    {
        return $this->hasOne(StockProduct::class, 'product_id');
    }

    public function image() 
    {
        return $this->hasMany(ImgProduct::class, 'product_id');
    }
}
