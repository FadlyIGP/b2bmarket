<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstRekening extends Model
{
    use HasFactory;

    protected $table = 'mst_rekening';

    protected $fillable = [ 
    	'id',
    	'company_id',
    	'bank_code',
    	'rek_number'
    ];
}
