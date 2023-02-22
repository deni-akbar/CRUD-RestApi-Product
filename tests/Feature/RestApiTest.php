<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class RestApiTest extends TestCase
{

    public function testSuccessGetAllProducts()
    {
        $this->json('GET', '/api/products')
            ->assertStatus(200);
    }
    
    public function testSuccessGetAllCategorys()
    {
        $this->json('GET', '/api/categories')
            ->assertStatus(200);
    }
    
    public function testSuccessGetAllImages()
    {
        $this->json('GET', '/api/images')
            ->assertStatus(200);
    }
        
    public function testSuccessGetAllCategoryProducts()
    {
        $this->json('GET', '/api/category_products')
            ->assertStatus(200);
    }

    public function testSuccessGetAllProductImages()
    {
        $this->json('GET', '/api/product_images')
            ->assertStatus(200);
    }
    
}
