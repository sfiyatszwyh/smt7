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
        'category_id',
        'name',
        'description',
        'price',
        'stock',
        
    ];
    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'product_id');
    }
    public function stockLogs()
    {
        return $this->hasMany(StockLog::class, 'product_id');
    }
    public function category()
    {
        return $this->hasMany(Category::class, 'product_id');
    }
}
