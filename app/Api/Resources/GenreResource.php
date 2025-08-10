<?php

namespace App\Api\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GenreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id'            =>$this->id,
            'name'          =>$this->name,
            'logo'          =>$this->logo,
            'status'        =>$this->status,
            
        ];
    }
}
