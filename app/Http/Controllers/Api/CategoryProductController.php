<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryProductRequest;
use App\Interfaces\CategoryProductInterface;

class CategoryProductController extends Controller
{
    protected $categoryProductInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(CategoryProductInterface $categoryProductInterface)
    {
        $this->categoryProductInterface = $categoryProductInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->categoryProductInterface->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryProductRequest $request)
    {
        return $this->categoryProductInterface->request($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->categoryProductInterface->getById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryProductRequest $request, $id)
    {
        return $this->categoryProductInterface->request($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->categoryProductInterface->delete($id);
    }
}
