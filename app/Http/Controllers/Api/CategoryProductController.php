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
     * @OA\Get(
     *    path="/api/category_products",
     *    operationId="getAllCategoryProduct",
     *    tags={"CategoryProduct"},
     *    summary="Get list of CategoryProduct",
     *    description="Get list of CategoryProduct",
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example="200"),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */
    public function index()
    {
        return $this->categoryProductInterface->getAll();
    }

 /**
     * @OA\Post(
     *      path="/api/category_products",
     *      operationId="storeCategoryProduct",
     *      tags={"CategoryProduct"},
     *      summary="Store CategoryProduct ",
     *      description="Store CategoryProduct ",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"product_id", "category_id"},
     *            @OA\Property(property="product_id", type="integer", format="integer", example="1"),
     *            @OA\Property(property="category_id", type="integer", format="integer", example="1"),
     *         ),
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */
    public function store(CategoryProductRequest $request)
    {
        return $this->categoryProductInterface->request($request);
    }

    /**
     * @OA\Get(
     *    path="/api/category_products/{id}",
     *    operationId="showCategoryProduct",
     *    tags={"CategoryProduct"},
     *    summary="Get CategoryProduct Detail",
     *    description="Get CategoryProduct Detail",
     *    @OA\Parameter(name="id", in="path", description="Id of CategoryProduct", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *     @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *          @OA\Property(property="status_code", type="integer", example="200"),
     *          @OA\Property(property="data",type="object")
     *           ),
     *        )
     *       )
     *  )
     */
    public function show($id)
    {
        return $this->categoryProductInterface->getById($id);
    }

/**
     * @OA\Put(
     *     path="/api/category_products/{id}",
     *     operationId="updateCategoryProduct",
     *     tags={"CategoryProduct"},
     *     summary="Update CategoryProduct",
     *     description="Update CategoryProduct",
     *     @OA\Parameter(name="id", in="path", description="Id of CategoryProduct", required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(
     *           required={"product_id", "category_id"},
     *           @OA\Property(property="product_id", type="integer", format="integer", example="1"),
     *           @OA\Property(property="category_id", type="integer", format="integer", example="1"),    
     * ),
     *     ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example="200"),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */
    public function update(CategoryProductRequest $request, $id)
    {
        return $this->categoryProductInterface->request($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/api/category_products/{id}",
     *      operationId="deleteCategoryProduct",
     *      tags={"CategoryProduct"},
     *      summary="Delete existing product",
     *      description="",
     *      @OA\Parameter( name="id", description="Product id", required=true, in="path", @OA\Schema( type="integer" )),
     *      @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example="200"),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     * )
     */
    public function destroy($id)
    {
        return $this->categoryProductInterface->delete($id);
    }
}
