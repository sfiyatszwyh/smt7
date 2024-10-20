<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'transaction_date',
        'total_price',
        'payment',
        'change'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, );
    }
    public function transactionDetail()
    {
        return $this->belongsTo(TransactionDetail::class, );
    }
}
