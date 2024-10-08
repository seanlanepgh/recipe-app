<?php


namespace App\Repositories\Interfaces;

use App\Http\Requests\RecipeRequest;
use App\Http\Requests\RecipeSearchRequest;

/** Interface for the RecipeRepository 
 */
interface RecipeRepositoryInterface
{

    public function index();
    public function search(RecipeSearchRequest $request);
    public function show($id);
    public function store(RecipeRequest $request);
    public function update(RecipeRequest $request, $id);
    public function destroy($id);
    public function latest();
    public function randomRecipe();
    public function randomTen();
}
