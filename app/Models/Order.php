<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    const STATUS_NEW = 'new';
    const STATUS_COMPLETED = 'completed';
    protected $fillable = [
        'customer_name',
        'status',
        'comment',
        'product_id',
        'quantity',
        'total_price'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
