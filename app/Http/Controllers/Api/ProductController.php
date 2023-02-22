<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Interfaces\ProductInterface;

class ProductController extends Controller
{
    protected $productInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(ProductInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

    /**
     * @OA\Get(
     *    path="/api/products",
     *    operationId="getAllProducts",
     *    tags={"Products"},
     *    summary="Get list of products",
     *    description="Get list of products",
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
        return $this->productInterface->getAll();
    }
 /**
     * @OA\Post(
     *      path="/api/products",
     *      operationId="storeProduct",
     *      tags={"Products"},
     *      summary="Store products ",
     *      description="Store products ",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"name", "description"},
     *            @OA\Property(property="name", type="string", format="string", example="Milk"),
     *            @OA\Property(property="description", type="string", format="string", example="This is a description for milk"),
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
    public function store(ProductRequest $request)
    {
        return $this->productInterface->request($request);
    }

    /**
     * @OA\Get(
     *    path="/api/products/{id}",
     *    operationId="showProducts",
     *    tags={"Products"},
     *    summary="Get Products Detail",
     *    description="Get Products Detail",
     *    @OA\Parameter(name="id", in="path", description="Id of Products", required=true,
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
        return $this->productInterface->getById($id);
    }

/**
     * @OA\Put(
     *     path="/api/products/{id}",
     *     operationId="updateProduct",
     *     tags={"Products"},
     *     summary="Update products",
     *     description="Update products",
     *     @OA\Parameter(name="id", in="path", description="Id of Products", required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(
     *           required={"name", "description", "enable"},
     *           @OA\Property(property="name", type="string", format="string", example="Vanilla Milk"),
     *           @OA\Property(property="description", type="string", format="string", example="This is a description for Vanilla Milk"),
     *           @OA\Property(property="enable", type="integer", format="integer", example="1"),       
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
    public function update(ProductRequest $request, $id)
    {
        return $this->productInterface->request($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/api/products/{id}",
     *      operationId="deleteProduct",
     *      tags={"Products"},
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
        return $this->productInterface->delete($id);
    }
}
