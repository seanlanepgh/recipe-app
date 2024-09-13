<?php

namespace App\Services;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryService implements Interfaces\CategoryServiceInterface
{
    private $categoryRepository;

    /** Use object compostion to inject the AuthRepository class throught the interface*/
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return Category::collection($this->categoryRepository->index());
    }

    public function show($id)
    {
        $result = $this->categoryRepository->show($id);
        if ($result)
            return new Category($result);
        return response()->json(['message' => 'An error has occurred.'], 500);
    }
    public function store(CategoryRequest $request)
    {

        $category = $this->categoryRepository->store($request);
        if ($category)
            return response()->json(['message' => 'Stored Category successfully.', 'category' => $category], 201);
        return response()->json(['message' => 'An error has occurred.'], 500);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = $this->categoryRepository->store($request, $id);
        if ($category)
            return response()->json(['message' => 'Update Category successfully.', 'category' => $category], 201);
        return response()->json(['message' => 'An error has occurred.'], 500);
    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->destory($id);
        if ($category)
            return response()->json(['message' => 'Deleted Category successfully.', 'category' => $category], 201);
        return response()->json(['message' => 'An error has occurred.'], 500);
    }
}
