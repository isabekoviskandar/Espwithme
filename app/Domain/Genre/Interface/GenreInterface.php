<?php

namespace App\Domain\Genre\Interface;

interface GenreInterface{

    public function index();
    public function create();
    public function update();
    public function delete();
}