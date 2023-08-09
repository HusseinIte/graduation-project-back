<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'email'=>$this->email,
            'type_id'=>$this->user_type_id,
            'role'=>$this->userType->type,
            'customer'=>$this->customer
        ];
    }
}
