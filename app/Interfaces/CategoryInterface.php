<?php

namespace App\Interfaces;

use App\Http\Requests\CategoryRequest;

interface CategoryInterface
{

    public function getAll();

    public function getById($id);

    public function request(CategoryRequest $request, $id = null);

    public function delete($id);
}