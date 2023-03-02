<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes=[
            'dish_1'=> [
                'name' => 'Margherita',
                'description' => 'Pomodoro, Mozzarella, basilico, Olio',
                'image' => 'Immagine',
                'visible' => true,
                'price' => '5.00',
                'id_restaurant' => "1"
            ],
            'dish_2'=> [
                'name' => 'Kebab',
                'description' => 'Pollo, Manzo, Insalata, Cipolla, Pomodoro, Salsa Piccante, Salsa Yogurt,',
                'image' => 'immagine',
                'visible' => true,
                'price' => '4.00',
                'id_restaurant' => "1"
            ],
            
        ];

        foreach ($dishes as $dish) {
            Dish::create([
                'name' => $dish['name'], 
                'description' => $dish['description'], 
                'image' => $dish['image'], 
                'visible' => $dish['visible'], 
                'price' => $dish['price'], 
                'id_restaurant' => $dish["id_restaurant"],
            ]);
        };
    }
}
