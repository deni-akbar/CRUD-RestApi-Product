<?php

namespace App\Interfaces;

use App\Http\Requests\CategoryProductRequest;

interface CategoryProductInterface
{

    public function getAll();

    public function getById($id);

    public function request(CategoryProductRequest $request, $id = null);

    public function delete($id);
}