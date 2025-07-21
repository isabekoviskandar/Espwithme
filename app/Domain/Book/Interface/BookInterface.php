<?php 


namespace App\Domain\Book\Interface;

use App\Api\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;

interface BookInterface{


    public function index();
    public function create(CreateBookRequest $request);
    public function update(UpdateBookRequest $request , $id);
    public function delete($id);
}