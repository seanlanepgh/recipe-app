<?php


namespace App\Repositories\Interfaces;

use App\Http\Requests\IngredientRequest;

/** Interface for the IngriedentRepository 
 */
interface IngredientRepositoryInterface
{
    public function index();
    public function show($id);
    public function store(IngredientRequest $request);
    public function update(IngredientRequest $request, $id);
    public function destroy($id);
}
