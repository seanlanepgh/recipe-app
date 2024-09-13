<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\IngredientRequest;
use App\Services\Interfaces\IngredientServiceInterface;

class IngredientController extends Controller
{
    private $ingredientService;

    public function __construct(IngredientServiceInterface $ingredientService)
    {
        $this->ingredientService = $ingredientService;
    }
    public function index()
    {
        return $this->ingredientService->index();
    }

    public function show($id)
    {
        return $this->ingredientService->show($id);
    }
    public function store(IngredientRequest $request)
    {
        return $this->ingredientService->store($request);
    }
    public function update(IngredientRequest $request, $id)
    {
        return $this->ingredientService->store($request, $id);
    }

    public function destroy($id)
    {
        return $this->ingredientService->destroy($id);
    }
}
