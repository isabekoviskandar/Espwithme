<?php

namespace App\Domain\Audio\Service;

use App\Api\Resources\AudioResource;
use App\Domain\Audio\Model\Audio;

class AudioService{

    public function index()
    {
        $audios = Audio::all();
        return AudioResource::collection($audios);
    }

    public function filterByCategory($category_id)
    {
        $audios = Audio::where('category_id' , $category_id)->get();
        return AudioResource::collection($audios);
    }
}