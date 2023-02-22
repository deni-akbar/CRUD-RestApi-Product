<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Interfaces\ImageInterface;

class ImageController extends Controller
{
    protected $imageInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(ImageInterface $imageInterface)
    {
        $this->imageInterface = $imageInterface;
    }

    /**
     * @OA\Get(
     *    path="/api/images",
     *    operationId="getAllImages",
     *    tags={"Images"},
     *    summary="Get list of images",
     *    description="Get list of images",
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
        return $this->imageInterface->getAll();
    }

 /**
     * @OA\Post(
     *      path="/api/images",
     *      operationId="storeImage",
     *      tags={"Images"},
     *      summary="Store Images ",
     *      description="Store Images ",
     *      @OA\RequestBody(
     *         required=true,
     *          @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     description="file to upload",
     *                     property="file",
     *                     type="file",
     *                ),
     *            @OA\Property(property="name", type="string", format="string", example="File product"),
     *            @OA\Property(property="enable", type="integer", format="integer", example="1"),
     *                 required={"file","name","enable"}
     *             )
     *         )
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
    public function store(ImageRequest $request)
    {
        return $this->imageInterface->request($request);
    }

    /**
     * @OA\Get(
     *    path="/api/images/{id}",
     *    operationId="showImages",
     *    tags={"Images"},
     *    summary="Get Images Detail",
     *    description="Get Images Detail",
     *    @OA\Parameter(name="id", in="path", description="Id of Images", required=true,
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
        return $this->imageInterface->getById($id);
    }

/**
     * @OA\Post(
     *     path="/api/images/{id}",
     *     operationId="updateImage",
     *     tags={"Images"},
     *     summary="Update images",
     *     description="Update images",
     *     @OA\Parameter(name="id", in="path", description="Id of Images", required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *      @OA\RequestBody(
     *         required=true,
     *          @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     description="file to upload",
     *                     property="file",
     *                     type="file",
     *                ),
     *            @OA\Property(property="name", type="string", format="string", example="File product"),
     *            @OA\Property(property="enable", type="integer", format="integer", example="1"),
     *                 required={"file","name","enable"}
     *             )
     *         )
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example="200"),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */
    public function update(ImageRequest $request, $id)
    {
        return $this->imageInterface->request($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/api/images/{id}",
     *      operationId="deleteImage",
     *      tags={"Images"},
     *      summary="Delete existing product",
     *      description="",
     *      @OA\Parameter( name="id", description="Image id", required=true, in="path", @OA\Schema( type="integer" )),
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
        return $this->imageInterface->delete($id);
    }
}
