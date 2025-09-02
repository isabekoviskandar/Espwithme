<?php


namespace App\Domain\Genre\Service;

use App\Api\Requests\CreateGenreRequest;
use App\Domain\Genre\Repository\GenreRepository;

class GenreService{


    public $genreRepository;

    public function __construct(GenreRepository $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    public function index()
    {
        return $this->genreRepository->index();
    }

}