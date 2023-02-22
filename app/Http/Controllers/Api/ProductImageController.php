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
     * @OA\Get(
     *    path="/api/product_images",
     *    operationId="getAllProductImage",
     *    tags={"ProductImage"},
     *    summary="Get list of ProductImage",
     *    description="Get list of ProductImage",
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
        return $this->productImageInterface->getAll();
    }

 /**
     * @OA\Post(
     *      path="/api/product_images",
     *      operationId="storeProductImage",
     *      tags={"ProductImage"},
     *      summary="Store ProductImage ",
     *      description="Store ProductImage ",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"product_id", "image_id"},
     *            @OA\Property(property="product_id", type="integer", format="integer", example="1"),
     *            @OA\Property(property="image_id", type="integer", format="integer", example="1"),
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
    public function store(ProductImageRequest $request)
    {
        return $this->productImageInterface->request($request);
    }

    /**
     * @OA\Get(
     *    path="/api/product_images/{id}",
     *    operationId="showProductImage",
     *    tags={"ProductImage"},
     *    summary="Get ProductImage Detail",
     *    description="Get ProductImage Detail",
     *    @OA\Parameter(name="id", in="path", description="Id of ProductImage", required=true,
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
        return $this->productImageInterface->getById($id);
    }

/**
     * @OA\Put(
     *     path="/api/product_images/{id}",
     *     operationId="updateProductImage",
     *     tags={"ProductImage"},
     *     summary="Update ProductImage",
     *     description="Update ProductImage",
     *     @OA\Parameter(name="id", in="path", description="Id of ProductImage", required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(
     *           required={"product_id", "image_id"},
     *           @OA\Property(property="product_id", type="integer", format="integer", example="1"),
     *           @OA\Property(property="image_id", type="integer", format="integer", example="1"),    
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
    public function update(ProductImageRequest $request, $id)
    {
        return $this->productImageInterface->request($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/api/product_images/{id}",
     *      operationId="deleteProductImage",
     *      tags={"ProductImage"},
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
        return $this->productImageInterface->delete($id);
    }
}
