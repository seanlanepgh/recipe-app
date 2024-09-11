<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return response()->json($recipes);
    }

    public function show($id)
    {
        $recipe = Recipe::find($id);
        return response()->json($recipe);
    }
    public function store(Request $request)
    {
        $recipe = Recipe::create($request->all());
        return response()->json($recipe, 201);
    }
    public function update(Request $request, $id)
    {
        $recipe = Recipe::find($id);
        $recipe->update($request->all());
        return response()->json($recipe, 200);
    }

    public function destroy($id)
    {
        Recipe::destroy($id);
        return response()->json(null, 204);
    }

    public function latest()
    {
        $recipes = Recipe::latest()->take(10)->get();;
        return response()->json($recipes);
    }

    public function randomRecipe()
    {
        $recipe = Recipe::inRandomOrder()->first();
        return response()->json($recipe);
    }
    public function randomTen()
    {
        $recipes = Recipe::inRandomOrder()->limit(10)->get();
        return response()->json($recipes);
    }
}
