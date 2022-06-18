<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImgProduct extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'product_image';

    protected $fillable = [ 
        'id',
        'product_id',
        'img_file'
    ];
   
}
