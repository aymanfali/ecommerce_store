<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProducResource extends JsonResource
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
            'name' => $this->name,
            'image' => $this->image,
            'price' => $this->price,
            'category' => $this->category ? [
                'id' => $this->category->id,
                'name' => $this->category->name,
            ] : null,
            'on_sale' => $this->on_sale,
        ];
    }
}
