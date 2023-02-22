<?php

namespace App\Interfaces;

use App\Http\Requests\ImageRequest;

interface ImageInterface
{

    public function getAll();

    public function getById($id);

    public function request(ImageRequest $request, $id = null);

    public function delete($id);
}