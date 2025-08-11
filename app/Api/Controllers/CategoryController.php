<?php

namespace App\Api\Controllers;

use App\Domain\Category\Service\CategoryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category_service;

    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
    }

    public function index()
    {
        return $this->category_service->index();
    }
}
