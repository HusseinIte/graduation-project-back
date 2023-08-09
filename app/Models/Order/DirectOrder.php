<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'customerName',
        'centerName',
        'orderStatus',
        'orderType',
        'totalPrice',
        'isExecute'

    ];

    public function directOrderItems()
    {
        return $this->hasMany(DirectOrderItem::class);
    }

}
