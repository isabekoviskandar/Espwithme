<?php

namespace App\Domain\Genre\Repository;

use App\Api\Resources\GenreResource;
use App\Domain\Genre\Interface\GenreInterface;
use App\Domain\Genre\Model\Genre;

class GenreRepository implements GenreInterface{

    public function index()
    {
        $genres = Genre::all();
        return GenreResource::collection($genres);
    }

    public function create()
    {
        
    }

    public function update()
    {
        
    }

    public function delete()
    {
        
    }


}