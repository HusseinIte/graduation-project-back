<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResourse extends JsonResource
{

    public function toArray(Request $request)
    {
        return [
            "id" => $this->id,
            "product_id" => $this->product_id,
            "productName" => $this->product->category->name,
            "numberModel" => $this->product->numberModel,
            "quantity" => $this->quantity
        ];
    }
}
