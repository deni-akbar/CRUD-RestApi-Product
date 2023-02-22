<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImageRequest;
use App\Interfaces\ProductImageInterface;

class ProductImageController extends Controller
{
    protected $productImageInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(ProductImageInterface $productImageInterface)
    {
        $this->productImageInterface = $productImageInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->productImageInterface->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductImageRequest $request)
    {
        return $this->productImageInterface->request($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->productImageInterface->getById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductImageRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductImageRequest $request, $id)
    {
        return $this->productImageInterface->request($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->productImageInterface->delete($id);
    }
}
