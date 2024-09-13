<?php

namespace App\Repositories;

use App\Http\Requests\IngredientRequest;
use App\Models\Ingredient;

class IngredientRepository implements Interfaces\IngredientRepositoryInterface
{

    public function index()
    {
        return Ingredient::all();
    }

    public function show($id)
    {
        return Ingredient::find($id);
    }
    public function store(IngredientRequest $request)
    {
        return Ingredient::create($request->all());
    }
    public function update(IngredientRequest $request, $id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->update($request->all());
        return $ingredient;
    }

    public function destroy($id)
    {
        return Ingredient::destroy($id);
    }
}
