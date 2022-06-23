<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankCode extends Model
{
    use HasFactory;

    protected $table = 'bank_code';

    protected $fillable = [ 
    	'id',    	
    	'bank_code',
    	'bank_image'
    ];
}
