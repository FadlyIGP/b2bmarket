<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMitra extends Model
{
    use HasFactory;
    protected $table = 'user_mitra';

    protected $fillable = [ 
        'id',
        'name',
        'email',
        'phone',
        'tel_number',
        'status',
        'company_id',
        'address_id',
    ];
}
