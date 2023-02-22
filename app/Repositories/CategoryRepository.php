<?php

namespace App\Repositories;

use App\Http\Requests\CategoryRequest;
use App\Interfaces\CategoryInterface;
use App\Traits\ResponseAPI;
use App\Models\Category;
use DB;

class CategoryRepository implements CategoryInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAll()
    {
        try {
            $categorys = Category::latest()->paginate(20);
            return $this->success("All Categorys", $categorys);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getById($id)
    {
        try {
            $category = Category::find($id);
            
            // Check the category
            if(!$category) return $this->error("No category with ID $id", 404);

            return $this->success("Category Detail", $category);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function request(CategoryRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            // If category exists when we find it
            // Then update the category
            // Else create the new one.
            $category = $id ? Category::find($id) : new Category;

            if($id && !$category) return $this->error("No category with ID $id", 404);

            if($id){
                $category->update($request->all());
            }else{
                $category->create($request->all());
            }

            DB::commit();
            return $this->success(
                $id ? "Category updated"
                    : "Category created",
                $category, $id ? 200 : 201);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $category = Category::find($id);

            // Check the category
            if(!$category) return $this->error("No category with ID $id", 404);

            // Delete the category
            $category->delete();

            DB::commit();
            return $this->success("Category deleted", $category);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}