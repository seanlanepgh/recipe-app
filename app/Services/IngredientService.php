<?php

namespace App\Services;

use App\Http\Requests\IngredientRequest;
use App\Http\Resources\Ingredient;
use App\Repositories\Interfaces\IngredientRepositoryInterface;

class IngredientService implements Interfaces\IngredientServiceInterface
{
    private $ingredientRepository;

    /** Use object compostion to inject the AuthRepository class throught the interface*/
    public function __construct(IngredientRepositoryInterface $ingredientRepository)
    {
        $this->ingredientRepository = $ingredientRepository;
    }

    public function index()
    {
        return Ingredient::collection($this->ingredientRepository->index());
    }

    public function show($id)
    {
        $result = $this->ingredientRepository->show($id);
        if ($result)
            return new Ingredient($result);
        return response()->json(['message' => 'An error has occurred.'], 500);
    }

    public function store(IngredientRequest $request)
    {

        $ingredient = $this->ingredientRepository->store($request);
        if ($ingredient)
            return response()->json(['message' => 'Stored Ingredient successfully.', 'ingredient' => $ingredient], 201);
        return response()->json(['message' => 'An error has occurred.'], 500);
    }

    public function update(IngredientRequest $request, $id)
    {
        $ingredient = $this->ingredientRepository->store($request, $id);
        if ($ingredient)
            return response()->json(['message' => 'Update Ingredient successfully.', 'ingredient' => $ingredient], 201);
        return response()->json(['message' => 'An error has occurred.'], 500);
    }

    public function destroy($id)
    {
        $ingredient = $this->ingredientRepository->destroy($id);
        if ($ingredient)
            return response()->json(['message' => 'Deleted Ingredient successfully.', 'ingredient' => $ingredient], 201);
        return response()->json(['message' => 'An error has occurred.'], 500);
    }
}
