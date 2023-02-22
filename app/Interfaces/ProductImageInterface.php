<?php

namespace App\Interfaces;

use App\Http\Requests\ProductImageRequest;

interface ProductImageInterface
{

    public function getAll();

    public function getById($id);

    public function request(ProductImageRequest $request, $id = null);

    public function delete($id);
}