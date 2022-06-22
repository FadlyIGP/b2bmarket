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
        'payment_method',
        'expiration_date',
        'name',
        'email',
        'status'
    ];

    public function transaction() 
    {
        return $this->hasOne(MstTransaction::class, 'id');
    }

    public function transactionitem() 
    {
        return $this->hasOne(TransactionItem::class, 'transaction_id');
    }
}
