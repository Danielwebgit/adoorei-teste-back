<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sale_id' => $this->sale_id,
            'amount' => $this->amount,
            'price_total' => $this->price_total,
            'status' => $this->status,
            'products' => ItemsResource::collection($this->whenLoaded('items')),
        ];
    }
}
