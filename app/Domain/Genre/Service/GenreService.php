<?php


namespace App\Domain\Genre\Service;

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

    public function create()
    {
        return $this->genreRepository->create();
    }

    public function update()
    {
        return $this->genreRepository->update();
    }

    public function delete()
    {
        return $this->genreRepository->delete();
    }
}