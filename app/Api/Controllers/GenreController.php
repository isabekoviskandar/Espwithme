<?php

namespace App\Api\Controllers;

use App\Domain\Genre\Service\GenreService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public $genreService;

    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function index()
    {
        return $this->genreService->index();
    }
}
