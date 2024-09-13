<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\Interfaces\CategoryServiceInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        return $this->categoryService->index();
    }

    public function show($id)
    {
        return $this->categoryService->show($id);
    }
    public function store(CategoryRequest $request)
    {
        return $this->categoryService->store($request);
    }
    public function update(CategoryRequest $request, $id)
    {
        return $this->categoryService->store($request, $id);
    }

    public function destroy($id)
    {
        return $this->categoryService->destroy($id);
    }
}
