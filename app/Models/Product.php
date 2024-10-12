<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'stock',
        'category'
    ];
    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'product_id');
    }
    public function stockLogs()
    {
        return $this->hasMany(StockLog::class, 'product_id');
    }
}
