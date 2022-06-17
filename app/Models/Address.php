<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'mst_address';

    protected $fillable = [ 
        'id',
        'name',
        'user_id',
        'company_id',
        'contact',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'complete_address',
        'patokan',
        'postcode',
        'primary_address',

    ];
}

