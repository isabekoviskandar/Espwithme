<?php

namespace App\Domain\Genre\Interface;

use App\Api\Requests\CreateGenreRequest;
use App\Api\Requests\UpdateGenreRequest;

interface GenreInterface{

    public function index();
    public function create(CreateGenreRequest $request);
    public function update(UpdateGenreRequest $request);
    public function delete();
}