<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\Models\CategoryProduct;
use App\Models\ProductImage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Milk',
            'description' => 'This drink for kids is so quick and easy and I have to admit that I was shocked by how good it is. I don’t regularly drink milk on its own but this makes me kind of want to. (Same with my other Flavored Milks.)',
        ]);
        Category::create([
            'name' => 'Drink',
        ]);
        Image::create([
            'name' => 'Image 1',
            'file' => 'https://images.pexels.com/photos/6195084/pexels-photo-6195084.jpeg',
        ]);
        CategoryProduct::create([
            'product_id' =>1,
            'category_id' => 1,
        ]);
        ProductImage::create([
            'product_id' =>1,
            'image_id' => 1,
        ]);
    }
}
