<?php


namespace App\Domain\Book\Service;

use App\Api\Requests\CreateBookRequest;
use App\Domain\Book\Repository\BookRepository;
use App\Http\Requests\UpdateBookRequest;

class BookService{

    private $bookRepo;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepo = $bookRepository;
    }

    public function index()
    {
        return $this->bookRepo->index();
    }

    public function create(CreateBookRequest $request)
    {
        return $this->bookRepo->create($request);
    }

    public function update(UpdateBookRequest $request , $id)
    {
        return $this->bookRepo->update($request , $id);
    }

    public function delete($id)
    {
        return $this->bookRepo->delete($id);
    }
}