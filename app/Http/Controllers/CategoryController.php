<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;


class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
}
