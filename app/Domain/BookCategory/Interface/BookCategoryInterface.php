<?php


namespace App\Domain\BookCategory\Interface;

use App\Api\Requests\CreateBookCategoryRequest;

interface BookCategoryInterface{

    public function index();
    public function create(CreateBookCategoryRequest $request);
    public function update($request , $id);
    public function delete($id);
}