<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //detay datalarında istediğimiz dataları bu customerSource ile gizleyebiliriz
        return [
            'id' =>$this->id,
            'name' => $this->name,
            'type' => $this->type,
            'email' => $this->email,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'bills' => BillResource::collection($this->whenLoaded('bills')) //includeBills=true olduğunda bu customer a ait faturalar gelir
        ];
    }
}
