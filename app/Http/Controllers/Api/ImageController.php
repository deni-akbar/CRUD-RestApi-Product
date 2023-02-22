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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->imageInterface->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        return $this->imageInterface->request($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->imageInterface->getById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ImageRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageRequest $request, $id)
    {
        return $this->imageInterface->request($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->imageInterface->delete($id);
    }
}
