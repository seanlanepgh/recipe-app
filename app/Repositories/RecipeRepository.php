<?php

namespace App\Repositories;

use App\Http\Requests\RecipeRequest;
use App\Models\Recipe;

class RecipeRepository implements Interfaces\RecipeRepositoryInterface
{
    public function index()
    {
        return Recipe::all();
    }

    public function show($id)
    {
        return Recipe::find($id);
    }
    public function store(RecipeRequest $request)
    {
        $recipe = Recipe::create($request->all());
        return $recipe;
    }
    public function update(RecipeRequest $request, $id)
    {
        $recipe = Recipe::find($id);
        $recipe->update($request->all());
        return $recipe;
    }

    public function destroy($id)
    {
        return Recipe::destroy($id);
    }

    public function latest()
    {
        return Recipe::latest()->take(10)->get();
    }

    public function randomRecipe()
    {
        return Recipe::inRandomOrder()->first();
    }
    public function randomTen()
    {
        return Recipe::inRandomOrder()->limit(10)->get();
    }
}
