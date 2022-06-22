<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstTransaction extends Model
{
    use HasFactory;
    protected $table = 'mst_transaction';

    protected $fillable = [ 
        'id',
        'invoice_number',
        'user_id',
        'company_id',
        'status',
        'address_id',
        'expected_ammount'
    ];

    public function item() 
    {
        return $this->hasMany(TransactionItem::class, 'transaction_id');
    }
    public function payment() 
    {
        return $this->hasOne(Payment::class, 'transaction_id');
    }
}
