<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

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
            'enable' => true,
        ]);
        Category::create([
            'name' => 'Drink',
            'enable' => true,
        ]);
    }
}
