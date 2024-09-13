<?php

namespace App\Repositories;

use App\Http\Requests\RecipeRequest;
use App\Http\Requests\RecipeSearchRequest;
use App\Models\Recipe;

class RecipeRepository implements Interfaces\RecipeRepositoryInterface
{

    public function index()
    {
        return Recipe::query()->paginate(15);
    }

    public function search(RecipeSearchRequest $request)
    {
        $query = Recipe::query();

        if ($name = $request->input('name')) {
            $query->where('name', 'like', "$name%");
        }

        if ($category = $request->input('category')) {
            $query->where('category', $category);
        }

        if ($area = $request->input('area')) {
            $query->where('area', $area);
        }

        if ($ingredients = $request->input('ingredients', [])) {
            foreach ($ingredients as $ingredient) {
                $query->whereJsonContains('ingredients', [['ingredient' => $ingredient]]);
            }
        }

        //dd($query);
        return $query->paginate(15);
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
        return Recipe::latest()->take(15)->get();
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
