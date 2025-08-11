<?php 


namespace App\Domain\Category\Service;

use App\Domain\Category\Model\Category;

class CategoryService{

    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories,
        ]);
    }
}