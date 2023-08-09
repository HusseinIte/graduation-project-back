<?php

namespace App\Models\Order;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectOrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'direct_order_id',
        'product_id',
        'quantity'
    ];


    public function directOrder()
    {
        return $this->belongsTo(DirectOrder::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
