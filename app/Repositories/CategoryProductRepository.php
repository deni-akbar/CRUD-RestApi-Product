<?php

namespace App\Repositories;

use App\Http\Requests\CategoryProductRequest;
use App\Interfaces\CategoryProductInterface;
use App\Traits\ResponseAPI;
use App\Models\CategoryProduct;
use DB;

class CategoryProductRepository implements CategoryProductInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAll()
    {
        try {
            $categoryProduct = CategoryProduct::latest()->with('product','category')->paginate(20);
            return $this->success("All Category Products", $categoryProduct);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getById($id)
    {
        try {
            $categoryProduct = CategoryProduct::where('id',$id)->with('product','category')->first();
            
            // Check the categoryProduct
            if(!$categoryProduct) return $this->error("No Category Product with ID $id", 404);

            return $this->success("CategoryProduct Detail", $categoryProduct);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function request(CategoryProductRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            // If categoryProduct exists when we find it
            // Then update the categoryProduct
            // Else create the new one.
            $categoryProduct = $id ? CategoryProduct::find($id) : new CategoryProduct;

            if($id && !$categoryProduct) return $this->error("No Category Product with ID $id", 404);

            if($id){
                $categoryProduct->update($request->all());
            }else{
                $categoryProduct->create($request->all());
            }

            DB::commit();
            return $this->success(
                $id ? "Category Product updated"
                    : "Category Product created",
                $categoryProduct, $id ? 200 : 201);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $categoryProduct = CategoryProduct::find($id);

            // Check the categoryProduct
            if(!$categoryProduct) return $this->error("No Category Product with ID $id", 404);

            // Delete the categoryProduct
            $categoryProduct->delete();

            DB::commit();
            return $this->success("Category Product deleted", $categoryProduct);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}