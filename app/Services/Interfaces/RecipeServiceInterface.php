<?php


namespace App\Services\Interfaces;

use App\Http\Requests\RecipeRequest;

/** Interface for the RecipesService
 */
interface RecipeServiceInterface
{
    public function index();
    public function show($id);
    public function store(RecipeRequest $request);
    public function update(RecipeRequest $request, $id);
    public function destroy($id);
    public function latest();
    public function randomRecipe();
    public function randomTen();
}
