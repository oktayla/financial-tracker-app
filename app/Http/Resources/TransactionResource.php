<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category' => new TransactionCategoryResource($this->category),
            'type' => $this->type,
            'amount' => $this->amount,
            'formatted_amount' => $this->formatted_amount,
            'created_at' => $this->created_at,
        ];
    }
}
