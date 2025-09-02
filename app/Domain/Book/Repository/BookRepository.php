<?php

namespace App\Domain\Book\Repository;

use App\Api\Requests\CreateBookRequest;
use App\Api\Resources\BookResource;
use App\Domain\Book\Interface\BookInterface;
use App\Domain\Book\Model\Book;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BookRepository implements BookInterface
{

    public function index()
    {
        $books = Book::with('genre')->get();
        return BookResource::collection($books);
    }

    public function create(CreateBookRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
            $validated['image'] = $imagePath;
        }

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('files', 'public');
            $validated['file'] = $filePath;
        }

        $book = Book::create($validated);

        return new BookResource($book);
    }

    public function update(UpdateBookRequest $request, $id)
    {

        $book = Book::findOrFail($id);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($book->image) {
                Storage::disk('public')->delete($book->image);
            }
            $imagePath = $request->file('image')->store('books', 'public');
            $validated['image'] = $imagePath;
        }

        if ($request->hasFile('file')) {
            if ($book->file) {
                Storage::disk('public')->delete($book->file);
            }
            $filePath = $request->file('file')->store('files', 'public');
            $validated['file'] = $filePath;
        }

        $book->update($validated);

        return new BookResource($book);
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);

        if ($book->image) {
            Storage::disk('public')->delete($book->image);
        }
        if ($book->file) {
            Storage::disk('public')->delete($book->file);
        }

        $book->delete();

        return response()->json([
            'message' => 'Book and associated files deleted successfully.'
        ],200);
    }
}
