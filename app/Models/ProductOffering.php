<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOffering extends Model
{
    use HasFactory;

    protected $table = 'product_offering';

    protected $fillable = [ 
        'id',
        'title',
        'descriptions',
        'buyer_id',
        'company_id',
        'product_id',
        'price_offering',
        'price_quotation',
        'approval_buyer',
        'approval_seller'

    ];

    // public function user() 
    // {
    //     return $this->hasOne(UserMitra::class, 'id','buyer_id');
    // }

    // public function product() 
    // {
    //     return $this->hasOne(MstProduct::class, 'id','product_id');
    // }
}

