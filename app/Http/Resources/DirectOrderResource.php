<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DirectOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customer_name' => $this->customerName,
            'centerName' => $this->centerName,
            'orderStatus' => $this->orderStatus,
            'orderType' => $this->orderType,
            'isExecute' => $this->isExecute,
            'totalPrice' => $this->totalPrice,
            'orderItem' => OrderItemResource::collection($this->directOrderItems),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
