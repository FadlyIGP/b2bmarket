<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdCategory extends Model
{
    use HasFactory;
    protected $table = 'product_category';

    protected $fillable = [ 
        'id',
        'name',
        'company_id',
    ];
}
