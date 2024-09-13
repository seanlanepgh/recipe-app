<?php

namespace App\Repositories;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function index()
    {
        return  Category::all();
    }

    public function show($id)
    {
        return Category::find($id);
    }
    public function store(CategoryRequest $request)
    {
        return Category::create($request->all());
    }
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        return $category;
    }

    public function destroy($id)
    {
        return Category::destroy($id);
    }
}
