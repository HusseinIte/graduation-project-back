<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function Illuminate\Http\Client\throwUnless;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "user_id" => $this->user->id,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "centerName" => $this->centerName,
            "city" => $this->city,
            "address" => $this->address,
            "phone" => $this->phone,
            "mobile" => $this->mobile,
            "email" => $this->user->email,
            "updated_at" => $this->updated_at,
            "created_at" => $this->created_at,
        ];
    }
}
