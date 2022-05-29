<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstCompany extends Model
{
    use HasFactory;
    protected $table = 'mst_company';

    protected $fillable = [ 
        'id',
        'company_name',
        'company_logo',
        'company_code',
    ];

}
