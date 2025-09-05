<?php

namespace App\Api\Controllers;

use App\Domain\Audio\Service\AudioService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    protected $service;

    public function __construct(AudioService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function filterByCategoryId($category_id)
    {
        return $this->service->filterByCategory($category_id);
    }
}
