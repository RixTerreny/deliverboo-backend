<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories=['giapponese','pizza','vegetariano','dessert','americano','kebab','italiano','poke','messicano', 'indiano'];
        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category['name'];
            $newCategory->save();


            Category::create([
                "name" => $category 
            ]);
        }
        }
    }
}
