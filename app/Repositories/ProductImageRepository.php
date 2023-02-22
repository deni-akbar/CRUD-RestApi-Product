<?php

namespace App\Repositories;

use App\Http\Requests\ProductImageRequest;
use App\Interfaces\ProductImageInterface;
use App\Traits\ResponseAPI;
use App\Models\ProductImage;
use DB;

class ProductImageRepository implements ProductImageInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAll()
    {
        try {
            $productImage = ProductImage::latest()->with('product','image')->paginate(20);
            return $this->success("All Image Products", $productImage);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getById($id)
    {
        try {
            $productImage = ProductImage::where('id',$id)->with('product','image')->first();
            
            // Check the productImage
            if(!$productImage) return $this->error("No Image Product with ID $id", 404);

            return $this->success("ProductImage Detail", $productImage);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function request(ProductImageRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            // If productImage exists when we find it
            // Then update the productImage
            // Else create the new one.
            $productImage = $id ? ProductImage::find($id) : new ProductImage;

            if($id && !$productImage) return $this->error("No Image Product with ID $id", 404);

            if($id){
                $productImage->update($request->all());
            }else{
                $productImage->create($request->all());
            }

            DB::commit();
            return $this->success(
                $id ? "Image Product updated"
                    : "Image Product created",
                $productImage, $id ? 200 : 201);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $productImage = ProductImage::find($id);

            // Check the productImage
            if(!$productImage) return $this->error("No Image Product with ID $id", 404);

            // Delete the productImage
            $productImage->delete();

            DB::commit();
            return $this->success("Image Product deleted", $productImage);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}