<?php

namespace App\Services\Interfaces;

use App\Http\Requests\CategoryRequest;

interface CategoryServiceInterface
{
    public function index();
    public function show($id);
    public function store(CategoryRequest $request);
    public function update(CategoryRequest $request, $id);
    public function destroy($id);
}
