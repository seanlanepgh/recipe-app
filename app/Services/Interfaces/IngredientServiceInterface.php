<?php

namespace App\Services\Interfaces;

use App\Http\Requests\IngredientRequest;

interface IngredientServiceInterface
{
    public function index();
    public function show($id);
    public function store(IngredientRequest $request);
    public function update(IngredientRequest $request, $id);
    public function destroy($id);
}
