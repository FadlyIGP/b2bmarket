<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';

    protected $fillable = [ 
        'id',
        'transaction_id',
        'user_id',
        'currency',
        'external_id',
        'bank_code',
        'account_number',
        'expected_ammount',
        'paid_at',
        'payment_chanel',
        'expiration_date',
        'name',
        'email',
        'status'
    ];
}