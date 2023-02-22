<?php

namespace App\Repositories;

use App\Http\Requests\ProductRequest;
use App\Interfaces\ProductInterface;
use App\Traits\ResponseAPI;
use App\Models\Product;
use DB;

class ProductRepository implements ProductInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAll()
    {
        try {
            $products = Product::latest()->paginate(20);
            return $this->success("All Products", $products);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getById($id)
    {
        try {
            $product = Product::find($id);
            
            // Check the product
            if(!$product) return $this->error("No product with ID $id", 404);

            return $this->success("Product Detail", $product);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function request(ProductRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            // If product exists when we find it
            // Then update the product
            // Else create the new one.
            $product = $id ? Product::find($id) : new Product;

            if($id && !$product) return $this->error("No product with ID $id", 404);

            $product->name = $request->name;
            $product->description = $request->description;

            // Save the product
            $product->save();

            DB::commit();
            return $this->success(
                $id ? "Product updated"
                    : "Product created",
                $product, $id ? 200 : 201);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $product = Product::find($id);

            // Check the product
            if(!$product) return $this->error("No product with ID $id", 404);

            // Delete the product
            $product->delete();

            DB::commit();
            return $this->success("Product deleted", $product);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}