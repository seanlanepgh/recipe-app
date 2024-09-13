<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecipeRequest;
use App\Models\Recipe;
use App\Services\Interfaces\RecipeServiceInterface;

class RecipeController extends Controller
{
    private $recipeService;

    public function __construct(RecipeServiceInterface $recipeService)
    {
        $this->recipeService = $recipeService;
    }
    public function index()
    {
        return $this->recipeService->index();
    }

    public function show($id)
    {
        return $this->recipeService->show($id);
    }
    public function store(RecipeRequest $request)
    {
        return $this->recipeService->store($request);
    }
    public function update(RecipeRequest $request, $id)
    {
        return $this->recipeService->store($request, $id);
    }

    public function destroy($id)
    {
        return $this->recipeService->destroy($id);
    }

    public function latest()
    {
        return $this->recipeService->latest();
    }

    public function randomRecipe()
    {
        return $this->recipeService->randomRecipe();
    }
    public function randomTen()
    {
        return $this->recipeService->randomTen();
    }
}
