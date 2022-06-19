<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;
    protected $table = 'transaction_history';

    protected $fillable = [ 
        'id',
        'transaction_id',
        'transaction_date',
        'status',
    ];    
}
