<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $categories = Ingredient::all();
        return response()->json($categories);
    }

    public function show($id)
    {
        $category = Ingredient::find($id);
        return response()->json($category);
    }
    public function store(Request $request)
    {
        $category = Ingredient::create($request->all());
        return response()->json($category, 201);
    }
    public function update(Request $request, $id)
    {
        $category = Ingredient::find($id);
        $category->update($request->all());
        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        Ingredient::destroy($id);
        return response()->json(null, 204);
    }
}
