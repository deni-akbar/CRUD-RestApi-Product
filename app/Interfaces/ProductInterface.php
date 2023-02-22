<?php

namespace App\Interfaces;

use App\Http\Requests\ProductRequest;

interface ProductInterface
{

    public function getAll();

    public function getById($id);

    public function request(ProductRequest $request, $id = null);

    public function delete($id);
}