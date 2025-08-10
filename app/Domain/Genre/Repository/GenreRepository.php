<?php

namespace App\Domain\Genre\Repository;

use App\Api\Requests\CreateGenreRequest;
use App\Api\Requests\UpdateGenreRequest;
use App\Api\Resources\GenreResource;
use App\Domain\Genre\Interface\GenreInterface;
use App\Domain\Genre\Model\Genre;

class GenreRepository implements GenreInterface
{

    public function index()
    {
        $genres = Genre::all();
        return GenreResource::collection($genres);
    }

    public function create(CreateGenreRequest $request)
    {
        return null;
    }

    public function update(UpdateGenreRequest $request) 
    {

    }

    public function delete() 
    {

    }
}
