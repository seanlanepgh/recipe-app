<?php


namespace App\Repositories\Interfaces;

use App\Http\Requests\CategoryRequest;

/** Interface for the CategoryRepository 
 */
interface CategoryRepositoryInterface
{

    public function index();
    public function show($id);
    public function store(CategoryRequest $request);
    public function update(CategoryRequest $request, $id);
    public function destroy($id);
}
