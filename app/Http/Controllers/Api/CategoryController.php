<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Interfaces\CategoryInterface;

class CategoryController extends Controller
{
    protected $categoryInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    /**
     * @OA\Get(
     *    path="/api/categories",
     *    operationId="getAllCategories",
     *    tags={"Categories"},
     *    summary="Get list of categories",
     *    description="Get list of categories",
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
        return $this->categoryInterface->getAll();
    }

 /**
     * @OA\Post(
     *      path="/api/categories",
     *      operationId="storeCategories",
     *      tags={"Categories"},
     *      summary="Store categories ",
     *      description="Store categories ",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"name"},
     *            @OA\Property(property="name", type="string", format="string", example="Dessert"),
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
    public function store(CategoryRequest $request)
    {
        return $this->categoryInterface->request($request);
    }

    /**
     * @OA\Get(
     *    path="/api/categories/{id}",
     *    operationId="showCategories",
     *    tags={"Categories"},
     *    summary="Get Categories Detail",
     *    description="Get Categories Detail",
     *    @OA\Parameter(name="id", in="path", description="Id of Categories", required=true,
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
        return $this->categoryInterface->getById($id);
    }

/**
     * @OA\Put(
     *     path="/api/categories/{id}",
     *     operationId="updateCategories",
     *     tags={"Categories"},
     *     summary="Update categories",
     *     description="Update categories",
     *     @OA\Parameter(name="id", in="path", description="Id of Categories", required=true,
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
    public function update(CategoryRequest $request, $id)
    {
        return $this->categoryInterface->request($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/api/categories/{id}",
     *      operationId="deleteCategories",
     *      tags={"Categories"},
     *      summary="Delete existing product",
     *      description="",
     *      @OA\Parameter( name="id", description="Categories id", required=true, in="path", @OA\Schema( type="integer" )),
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
        return $this->categoryInterface->delete($id);
    }
}
