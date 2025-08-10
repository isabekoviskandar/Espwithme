<?php

namespace App\Api\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'genre'         =>$this->genre->name,
            'title'         =>$this->title,
            'author'        =>$this->author,
            'description'   =>$this->description,
            'image'         =>$this->image,
            'file'          =>$this->file,
        ];
    }
}
