<?php

namespace App\Http\Resources;

use App\Models\Order\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {

        if ($this->orderType == "صيانة") {
            return [
                'id' => $this->id,
                'center_name' => $this->customer->centerName,
                'orderStatus' => $this->orderStatus,
                'orderType' => $this->orderType,
                'totalPrice' => $this->totalPrice,
                'Image' =>$this->orderDetail->image->path,
                'description' => $this->orderDetail->description,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
            ];
        }
        return [
            'id' => $this->id,
            'center_name' => $this->customer->centerName,
            'orderStatus' => $this->orderStatus,
            'orderType' => $this->orderType,
            'totalPrice' => $this->totalPrice,
            'orderItem' => OrderItemResource::collection($this->orderItems),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
