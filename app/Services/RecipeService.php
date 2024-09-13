<?php


namespace App\Services;

use App\Http\Requests\RecipeRequest;
use App\Http\Requests\RecipeSearchRequest;
use App\Http\Resources\Recipe;
use App\Repositories\Interfaces\RecipeRepositoryInterface;

class RecipeService implements Interfaces\RecipeServiceInterface
{
    private $recipeRepository;

    /** Use object compostion to inject the RecipeRepository class */
    public function __construct(RecipeRepositoryInterface $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function index()
    {
        return Recipe::collection($this->recipeRepository->index());
    }

    public function search(RecipeSearchRequest $request)
    {
        return Recipe::collection($this->recipeRepository->search($request));
    }
    public function show($id)
    {
        $result = $this->recipeRepository->show($id);
        if ($result)
            return new Recipe($result);
        return response()->json(['message' => 'An error has occurred.'], 500);
    }

    public function store(RecipeRequest $request)
    {

        $recipe = $this->recipeRepository->store($request);
        if ($recipe)
            return response()->json(['message' => 'Stored Recipe successfully.', 'recipe' => $recipe], 201);
        return response()->json(['message' => 'An error has occurred.'], 500);
    }

    public function update(RecipeRequest $request, $id)
    {
        $recipe = $this->recipeRepository->store($request, $id);
        if ($recipe)
            return response()->json(['message' => 'Update Recipe successfully.', 'recipe' => $recipe], 201);
        return response()->json(['message' => 'An error has occurred.'], 500);
    }

    public function destroy($id)
    {
        $recipe = $this->recipeRepository->destroy($id);
        if ($recipe)
            return response()->json(['message' => 'Deleted Recipe successfully.', 'recipe' => $recipe], 201);
        return response()->json(['message' => 'An error has occurred.'], 500);
    }

    public function latest()
    {
        return Recipe::collection($this->recipeRepository->latest());
    }

    public function randomRecipe()
    {;
        $result = $this->recipeRepository->randomRecipe();
        if ($result)
            return new Recipe($result);
        return response()->json(['message' => 'An error has occurred.'], 500);
    }

    public function randomTen()
    {
        return Recipe::collection($this->recipeRepository->randomTen());
    }
}
