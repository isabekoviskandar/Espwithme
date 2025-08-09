<?php

namespace App\Api\Controllers;

use App\Api\Requests\CreateBookRequest;
use App\Domain\Book\Service\BookService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    protected $bookSer;

    public function __construct(BookService $bookService)
    {
        $this->bookSer = $bookService;
    }

    public function index()
    {
        return $this->bookSer->index();
    }

    public function create(CreateBookRequest $request)
    {
        return $this->bookSer->create($request);
    }

    public function update(UpdateBookRequest $request , $id)
    {
        return $this->bookSer->update($request , $id);
    }

    public function delete($id)
    {
        return $this->bookSer->delete($id);
    }
}
