<?php

namespace App\Repositories;

use App\Http\Requests\ImageRequest;
use App\Interfaces\ImageInterface;
use App\Traits\ResponseAPI;
use App\Models\Image;
use DB;

class ImageRepository implements ImageInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAll()
    {
        try {
            $images = Image::latest()->paginate(20);
            return $this->success("All Images", $images);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getById($id)
    {
        try {
            $image = Image::find($id);
            
            // Check the image
            if(!$image) return $this->error("No image with ID $id", 404);

            return $this->success("Image Detail", $image);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function request(ImageRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            // If image exists when we find it
            // Then update the image
            // Else create the new one.
            $image = $id ? Image::find($id) : new Image;

            if($id && !$image) return $this->error("No image with ID $id", 404);

            if ($file = $request->file('file')) {
                $path = $file->store('public/files');
                $name = $file->getClientOriginalName();
            }

            $data= [
                'name' => $request->name,
                'file' => $name,
                'enable' => $request->enable
            ];

            if($id){
                $image->update($data);
            }else{
                $image->create($data);
            }

            DB::commit();
            return $this->success(
                $id ? "Image updated"
                    : "Image created",
                $image, $id ? 200 : 201);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $image = Image::find($id);

            // Check the image
            if(!$image) return $this->error("No image with ID $id", 404);

            // Delete the image
            $image->delete();

            DB::commit();
            return $this->success("Image deleted", $image);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}